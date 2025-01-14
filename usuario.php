<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "signup"){ //create
		include_once("controle/usuario/SignUpUsuario_class.php");
		$pag = new SignUpUsuario();

	} else if($fun == "signin"){ //entrar
		include_once("controle/usuario/SignInUsuario_class.php");
		$pag = new SignInUsuario();

	} else if($fun == "signout"){ //sair
		unset($_SESSION["usuario"]);
		echo "<script>alert('Usuário deslogado com sucesso!');";
		echo "javascript:history.go(-1);</script>";

	} else if($fun == "recuperarsenha"){
		proteger();
		//include_once("visao/usuario/formUpdateUsuario.php");

	} else if($fun == "updateSenha"){
		proteger();
		include_once("controle/usuario/UpdateSenhaUsuario_class.php");
		$pag = new UpdateSenhaUsuario();
		
	} else if($fun == "create"){
		protegerAdmin();
		include_once("controle/usuario/CreateUsuario_class.php");
		//$pag = new CreateUsuario();
		
	} else if($fun == "update"){
		proteger();
		include_once("controle/usuario/UpdateUsuario_class.php");
		$pag = new UpdateUsuario();
		
	} else if($fun == "list"){
		include_once("controle/usuario/ListUsuario_class.php");
		//$pag = new ListUsuario();
		
	} else if($fun == "delete"){
		include_once("controle/usuario/DeleteUsuario_class.php");//op == sim
		//$pag = new DeleteUsuario();
		
	}   else if($fun == "exibir") {
		include_once("controle/usuario/ExibirUsuario_class.php");
		//$pag = new ExibirUsuario();
		
	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	//include_once("visao/paginas/home.html");
	echo "<script>window.location.href='index.php';</script>";
}

include_once("visao/rodape.php");
?>