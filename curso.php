<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "create"){
		include_once("controle/curso/CreateCurso_class.php");
		$pag = new CreateCurso();

	} else if($fun == "list"){
		include_once("controle/curso/ListCurso_class.php");
		$pag = new ListCurso();

	} else if($fun == "update"){
		include_once("controle/curso/UpdateCurso_class.php");
		$pag = new UpdateCurso();

	} else if($fun == "delete"){
		include_once("controle/curso/DeleteCurso_class.php");
		$pag = new DeleteCurso();

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>