<?php 
/**
 * 
 */

use framework\view\View;
use app\models\{CompanyModel, TransactionsModel};
class CompanyController extends View
{
	function __construct()
	{
		parent::__construct();
		$this->error = array();
	}

	function index()
	{
		$company = new CompanyModel;
		$companys = $company->all();
		return $this->render('company/company_list', ['companys' => $companys]);
	}

	function add()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('company/company_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();	
		}
	}

	function update($id)
	{	
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$company = new CompanyModel;
			$company_search = $company->find('id', '=', $id);	
			if (count($company_search) != 0) {
				return $this->render('company/company_form', ['company' => $company_search]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save($id);	
		}
	}

	function delete($id)
	{
		$company = new CompanyModel;
		$transaction = new TransactionsModel; 
		$company_search = $company->find('id', '=', $id);	
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			if (count($company_search) != 0) {
				return $this->render('company/company_delete', ['company' => $company_search]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			if (val_csrf()) {
				$transactions = $transaction->where('id_empresa', '=', $id);
				if (count($transactions) != 0) {
					foreach ($transactions as $transaction) {
						$id_client = $transaction->id_client; 
						$transaction->delete($id_client);
					}
				}
				$company->delete($id);
				return redirect('company', ['message' => 'Eliminado Sastifactoriamente']);
			}else{
				return $this->render('error/403');
			}
		}
	}

	function detail($id)
	{
		$company = new CompanyModel;
		$company_search = $company->find('id', '=', $id);	
		if (count($company_search) != 0) {
			return $this->render('company/company_detail', ['company' => $company_search]);
		}else{
			return $this->render('error/404');
		}
	}

	private function save($id=null)
	{
		if (val_csrf()) {
			if ($this->form_valid() == true) {
				$company = new CompanyModel;
				$company->empresa = test_input($_POST['name']);
				if (!is_null($id)) {
					$company->id = (int)test_input($id);
					$company->save();
					return redirect('company', ['message' => 'Actualizado Exitosamente']);
				}else{
					$company->save();
					return redirect('company', ['message' => 'Guadador Exitosamente']);
				}
			}else{
				if (!is_null($id)) {
					return redirect("company/update/{$id}", ['error'=>$this->error]);
				}
				return redirect('company/add', ['error'=>$this->error]);
			}
		}else{
			return $this->render('error/403');
		}
	}

	private function form_valid()
	{
		$data = ['name' => 'Empresa'];

		foreach ($data as $attribute => $value ) {
			if (!test_text(test_input($_POST[$attribute]))) {
				array_push($this->error, "El Campo {$value} Es Solo Letra");	
			}

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