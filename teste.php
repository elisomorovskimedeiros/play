<?php

require_once("conexao.php");

$con = new Conexao();
$con->pesquisarTodosBrinquedos();
//single page aplication
?>