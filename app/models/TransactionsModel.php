<?php 
/**
 * 
 */

namespace app\models;
use framework\basedatos\Model;
class TransactionsModel extends Model
{
	protected static $table= "transacciones";

	function all_transactions()
	{
		$query = "SELECT c.nombre, c.apellido, e.empresa, t.monto, t.tipo, t.id
					FROM transacciones as t 
					LEFT JOIN clientes as c ON t.id_cliente = c.id
					LEFT JOIN empresas as e ON t.id_empresa = e.id
					WHERE 1";
		$transactions = $this->execute_query($query);
		return $transactions;
	}

	function transactions_by_id($id)
	{
		$query = "SELECT c.nombre, c.apellido, e.empresa, t.monto, t.tipo, t.id
					FROM transacciones as t 
					LEFT JOIN clientes as c ON t.id_cliente = c.id
					LEFT JOIN empresas as e ON t.id_empresa = e.id
					WHERE t.id = {$id}";
		$transaction = $this->execute_query($query);
		return $transaction;
	}	
}
?>