<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		proteger();
		include_once("controle/matricula/CreateMatricula_class.php");
		$pag = new CreateMatricula();

	} else if($fun == "list"){
		// ! NÃO É USADO (DESNECESSÁRIO) 
		// proteger();
		// include_once("controle/matricula/ListMatricula_class.php");
		//$pag = new ListMatricula();

	} else if($fun == "update"){
		// ! NÃO É USADO (DESNECESSÁRIO)
		// proteger();
		// include_once("controle/matricula/UpdateMatricula_class.php");
		//$pag = new UpdateMatricula();

	} else if($fun == "delete"){
		proteger();
		include_once("controle/matricula/DeleteMatricula_class.php");
		$pag = new DeleteMatricula();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>