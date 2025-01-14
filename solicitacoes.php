<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		include_once("controle/solicitacoes/CreateSolicitacoes_class.php");
		//$pag = new CreateSolicitacoes();

	} else if($fun == "list"){
		include_once("controle/solicitacoes/ListSolicitacoes_class.php");
		//$pag = new ListSolicitacoes();

	} else if($fun == "update"){
		include_once("controle/solicitacoes/UpdateSolicitacoes_class.php");
		//$pag = new UpdateSolicitacoes();

	} else if($fun == "delete"){
		include_once("controle/solicitacoes/DeleteSolicitacoes_class.php");
		//$pag = new DeleteSolicitacoes();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>