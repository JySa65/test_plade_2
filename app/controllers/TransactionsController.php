<?php 
/**
 * 
 */

use framework\view\View;
use app\models\{ClientModel, TransactionsModel, CompanyModel};
class TransactionsController extends View
{
	function __construct()
	{
		parent::__construct();
		$this->error = array();
	}

	function index()
	{
		$transaction = new TransactionsModel;
		$transactions = array_reverse($transaction->all_transactions(), true);
		return $this->render('transactions/transactions_list', ['transactions' => $transactions]);
	}

	function add()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$client = new ClientModel;
			$company = new CompanyModel;
			$data = [
				'clients' => $client->all(),
				'companys' => $company->all(),
			];
			return $this->render('transactions/transactions_form', $data);
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();	
		}
	}


	function delete($id)
	{
		$transactions = new TransactionsModel;
		$transactions_search = $transactions->transactions_by_id($id);
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			if (count($transactions_search) != 0) {
				return $this->render('transactions/transactions_delete', ['transaction' => $transactions_search[0]]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			if (val_csrf()) {
				$transactions->delete($id);
				return redirect('transactions', ['message' => 'Eliminado Sastifactoriamente']);
			}else{
				return $this->render('error/403');
			}
		}
	}

	function detail($id)
	{
		$transactions = new TransactionsModel;
		$transactions_search = $transactions->transactions_by_id($id);	
		if (count($transactions_search) != 0) {
			return $this->render('transactions/transactions_detail', ['transaction' => $transactions_search[0]]);
		}else{
			return $this->render('error/404');
		}
	}

	private function save()
	{
		if (val_csrf()) {
			if ($this->form_valid() == true) {
				$transactions = new TransactionsModel;
				$transactions->id_cliente = (int)test_input($_POST['client']);
				$transactions->id_empresa = (int)test_input($_POST['company']);
				$transactions->monto = (float)test_input($_POST['price']);
				$transactions->tipo = (int)test_input($_POST['type_transaction']);
				$transactions->save();
				return redirect('transactions', ['message' => 'Guadador Exitosamente']);
			}else{
				return redirect('transactions/add', ['error'=>$this->error]);
			}
		}else{
			return $this->render('error/403');
		}
	}

	private function form_valid()
	{
		$data = ["client" => "Cliente",
				 "company" => "Empresa",
				 "price" => "Monto",
				 "type_transaction" => "Tipo De Transaccion"
	];

	foreach ($data as $attribute => $value ) {
		if ($_POST[$attribute] == "") {
			array_push($this->error, "El Campo {$value} es requerida");	
		}
	}
	if (count($this->error) > 0) {
		return false;
	}
	return true;	
}
}

?>