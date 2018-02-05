<?php

/*
require_once ("controller/teste.php");

$t = new mostra;
$t->msg();
?>*/
define('BASE_PATH', __DIR__ . '/');

//include(BASE_PATH . 'controller/conexao.php');
//include(BASE_PATH . 'model/cliente.php');
//set_include_path(__DIR__);
include (__DIR__ . '/controller/conexao.php');
include (__DIR__ . '/gui/pagPrincipal.php');
//include("cliente.php");


//$con = new Conexao();
//$con->pesquisarTodosBrinquedos();




//$con->inserirIdCliente($evento_);



//print_r($con->verificarDisponibilidade(1));

?>

