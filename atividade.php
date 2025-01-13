<?php
session_start();
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "signup"){
		include_once("controle/usuario/SignUpUsuario_class.php");
		$pag = new SignUpUsuario();

	} else if($fun == "signin"){
		include_once("controle/usuario/SignInUsuario_class.php");
		$pag = new SignInUsuario();

	} else if($fun == "signout"){
		unset($_SESSION["usuario"]);
		echo "<script>alert('Usuário deslogaso com sucesso!');";
		echo "javascript:history.go(-1);</script>";

	} else if($fun == "recuperarsenha"){
		//include_once("visao/usuario/formUpdateUsuario.php");

	} else if($fun == "update"){
		proteger();
		include_once("controle/usuario/UpdateUsuario_class.php");
		$pag = new UpdateUsuario();
		
	} else if($fun == "updateSenha"){
		proteger();
		include_once("controle/usuario/UpdateSenhaUsuario_class.php");
		$pag = new UpdateSenhaUsuario();
		
	} /*else if($fun == "alterar"){
		include_once("controle/usuario/AlterarUsuario_class.php");
		$pag = new AlterarUsuario();
		
	} else if($fun == "excluir"){
		include_once("controle/usuario/ExcluirUsuario_class.php");//op == sim
		$pag = new ExcluirUsuario();
		
	} else if($fun == "listar"){
		include_once("controle/usuario/ListarUsuario_class.php");
		$pag = new ListarUsuario();
		
	}  else if($fun == "exibir") {
		include_once("controle/usuario/ExibirUsuario_class.php");
		$pag = new ExibirUsuario();
		
	}*/else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	include_once("visao/paginas/home.html");
}

include_once("visao/rodape.php");