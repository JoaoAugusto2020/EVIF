<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		// ! CRIADO AUTOMÁTICAMENTE PELA MATRÍCULA
		// protegerAdmin();
		// include_once("controle/solicitacao/CreateSolicitacao_class.php");
		//$pag = new CreateSolicitacao();

	} else if($fun == "list"){
		protegerAdmin();
		include_once("controle/solicitacao/ListSolicitacao_class.php");
		$pag = new ListSolicitacao();

	} else if($fun == "listUser"){
		// ! USADO DIRETO NO formConfigUsuario.php
		proteger();
		include_once("controle/solicitacao/ListSolicitacaoUser_class.php");
		$pag = new ListSolicitacaoUser();

	} else if($fun == "update"){
		// ! NÃO É USADO (DESNECESSÁRIO)
		// protegerAdmin();
		// include_once("controle/solicitacao/UpdateSolicitacao_class.php");
		//$pag = new UpdateSolicitacao();

	} else if($fun == "aceitar"){
		protegerAdmin();
		include_once("controle/solicitacao/AceitarSolicitacao_class.php");
		$pag = new AceitarSolicitacao();

	} else if($fun == "negar"){
		protegerAdmin();
		include_once("controle/solicitacao/NegarSolicitacao_class.php");
		$pag = new NegarSolicitacao();

	} else if($fun == "delete"){
		proteger();
		include_once("controle/solicitacao/DeleteSolicitacao_class.php");
		$pag = new DeleteSolicitacao();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>