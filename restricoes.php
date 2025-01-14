<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		include_once("controle/restricoes/CreateRestricoes_class.php");
		//$pag = new CreateRestricoes();

	} else if($fun == "list"){
		include_once("controle/restricoes/ListRestricoes_class.php");
		//$pag = new ListRestricoes();

	} else if($fun == "update"){
		include_once("controle/restricoes/UpdateRestricoes_class.php");
		//$pag = new UpdateRestricoes();

	} else if($fun == "delete"){
		include_once("controle/restricoes/DeleteRestricoes_class.php");
		//$pag = new DeleteRestricoes();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>