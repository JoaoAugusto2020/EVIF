<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		proteger();
		include_once("controle/inscricao/CreateInscricao_class.php");
		$pag = new CreateInscricao();

	} else if($fun == "list"){
		protegerAdmin();
		include_once("controle/inscricao/ListInscricao_class.php");
		$pag = new ListInscricao();

	} else if($fun == "listProf"){
		protegerProf();
		include_once("controle/inscricao/ListInscricaoProf_class.php");
		$pag = new ListInscricaoProf();

	} else if($fun == "listUser"){
		proteger();
		include_once("controle/inscricao/ListInscricaoUser_class.php");
		$pag = new ListInscricaoUser();

	} else if($fun == "exibir"){
		// ! NÃO É USADO (DESNECESSÁRIO)
		// include_once("controle/inscricao/ExibirInscricao_class.php");
		// $pag = new ExibirInscricao();

	} else if($fun == "update"){
		// ! NÃO É USADO (DESNECESSÁRIO)
		// include_once("controle/inscricao/UpdateInscricao_class.php");
		// $pag = new UpdateInscricao();

	} else if($fun == "delete"){
		proteger();
		include_once("controle/inscricao/DeleteInscricao_class.php");
		$pag = new DeleteInscricao();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>