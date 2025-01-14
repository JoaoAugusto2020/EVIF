<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		include_once("controle/notificacoes/CreateNotificacoes_class.php");
		//$pag = new CreateNotificacoes();

	} else if($fun == "list"){
		include_once("controle/notificacoes/ListNotificacoes_class.php");
		//$pag = new ListNotificacoes();

	} else if($fun == "update"){
		include_once("controle/notificacoes/UpdateNotificacoes_class.php");
		//$pag = new UpdateNotificacoes();

	} else if($fun == "delete"){
		include_once("controle/notificacoes/DeleteNotificacoes_class.php");
		//$pag = new DeleteNotificacoes();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>