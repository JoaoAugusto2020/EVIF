<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		include_once("controle/inscricao/CreateInscricao_class.php");
		//$pag = new CreateInscricao();

	} else if($fun == "listAdmin"){
		include_once("controle/inscricao/ListInscricao_class.php");
		//$pag = new ListInscricao();

	} else if($fun == "listProf"){
		include_once("controle/inscricao/ListInscricaoProf_class.php");
		//$pag = new ListInscricaoProf();

	} else if($fun == "listUser"){
		include_once("controle/inscricao/ListInscricaoUser_class.php");
		//$pag = new ListInscricaoUser();

	} else if($fun == "exibir"){
		include_once("controle/inscricao/ExibirInscricao_class.php");
		//$pag = new ExibirInscricao();

	} else if($fun == "update"){
		include_once("controle/inscricao/UpdateInscricao_class.php");
		//$pag = new UpdateInscricao();

	} else if($fun == "delete"){
		include_once("controle/inscricao/DeleteInscricao_class.php");
		//$pag = new DeleteInscricao();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>