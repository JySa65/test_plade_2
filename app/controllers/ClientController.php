<?php 
/**
 * 
 */

use framework\view\View;
use app\models\{ClientModel, TransactionsModel};
class ClientController extends View
{
	function __construct()
	{
		parent::__construct();
		$this->error = array();
	}

	function index()
	{
		$client = new ClientModel;
		$clients = $client->all();
		return $this->render('client/client_list', ['clients' => $clients]);
	}

	function add()
	{
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			return $this->render('client/client_form');
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save();	
		}
	}

	function update($id)
	{	
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			$client = new ClientModel;
			$client_search = $client->find('id', '=', $id);	
			if (count($client_search) != 0) {
				return $this->render('client/client_form', ['client' => $client_search]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->save($id);	
		}
	}

	function delete($id)
	{
		$client = new ClientModel;
		$transaction = new TransactionsModel; 
		$client_search = $client->find('id', '=', $id);	
		if($_SERVER['REQUEST_METHOD'] === "GET"){
			if (count($client_search) != 0) {
				return $this->render('client/client_delete', ['client' => $client_search]);
			}else{
				return $this->render('error/404');
			}
		}else if($_SERVER['REQUEST_METHOD'] === "POST") {
			if (val_csrf()) {
				$transactions = $transaction->where('id_cliente', '=', $id);
				if (count($transactions) != 0) {
					foreach ($transactions as $transaction) {
						$id_client = $transaction->id_client; 
						$transaction->delete($id_client);
					}
				}
				$client->delete($id);
				return redirect('client', ['message' => 'Eliminado Sastifactoriamente']);
			}else{
				return $this->render('error/403');
			}
		}
	}

	function detail($id)
	{
		$client = new ClientModel;
		$client_search = $client->find('id', '=', $id);	
		if (count($client_search) != 0) {
			return $this->render('client/client_detail', ['client' => $client_search]);
		}else{
			return $this->render('error/404');
		}
	}

	private function save($id=null)
	{
		if (val_csrf()) {
			if ($this->form_valid() == true) {
				$client = new ClientModel;
				$client->nombre = test_input($_POST['name']);
				$client->apellido = test_input($_POST['last_name']);
				if (!is_null($id)) {
					$client->id = (int)test_input($id);
					$client->save();
					return redirect('client', ['message' => 'Actualizado Exitosamente']);
				}else{
					$client->save();
					return redirect('client', ['message' => 'Guadador Exitosamente']);
				}
			}else{
				if (!is_null($id)) {
					return redirect("client/update/{$id}", ['error'=>$this->error]);
				}
				return redirect('client/add', ['error'=>$this->error]);
			}
		}else{
			return $this->render('error/403');
		}
	}

	private function form_valid()
	{
		$data = ['name' => 'Nombres',
		'last_name' => "Apellido"];

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