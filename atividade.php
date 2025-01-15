<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		protegerProf();
		include_once("controle/atividade/CreateAtividade_class.php");
		$pag = new CreateAtividade();

	} else if($fun == "list"){
		protegerAdmin();
		include_once("controle/atividade/ListAtividade_class.php");
		$pag = new ListAtividade();

	} else if($fun == "listProf"){
		protegerProf();
		include_once("controle/atividade/ListAtividadeProf_class.php");
		$pag = new ListAtividadeProf();

	} else if($fun == "listCards"){
		include_once("controle/atividade/ListAtividadeCards_class.php");
		$pag = new ListAtividadeCards();

	} else if($fun == "exibir"){
		include_once("controle/atividade/ExibirAtividade_class.php");
		$pag = new ExibirAtividade();

	} else if($fun == "update"){
		protegerProf();
		include_once("controle/atividade/UpdateAtividade_class.php");
		$pag = new UpdateAtividade();

	} else if($fun == "delete"){
		protegerProf();
		include_once("controle/atividade/DeleteAtividade_class.php");
		$pag = new DeleteAtividade();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>