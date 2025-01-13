<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		include_once("controle/matricula/CreateMatricula_class.php");
		//$pag = new CreateMatricula();

	} else if($fun == "delete"){
		include_once("controle/matricula/DeleteMatricula_class.php");
		$pag = new DeleteMatricula();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	include_once("visao/paginas/home.html");
}

include_once("visao/rodape.php");