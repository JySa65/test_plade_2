<?php 
use framework\route\Routes;

new Routes([
    "/" => "IndexController",
    "client" => "ClientController",
    "company" => "CompanyController",
    "transactions" => "TransactionsController"

])

?>