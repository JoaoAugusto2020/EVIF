<?php
include_once("modelo/UsuarioDAO_class.php");

class SignInUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			$u = new Usuario();
			$u->setEmail($_POST["email"]);
			$u->setSenha($_POST["senha"]);
			//$u->setIdUsuario($_POST["idUsuario"]); //a diferença é que no outro essa linha está oculta

			$dao = new UsuarioDAO();
			$erros = $dao->signin($u);

			if($erros == 0)
				echo "<script>javascript:history.go(-2);</script>";
			else{
				echo "<script>javascript:history.go(-1);</script>";
			}

		} else {
			//se entrar no else significa que nenhum 
			//formulário foi enviado, ou seja, a pessoa ainda não cadastrou o Usuario

      include_once("visao/usuario/formSignInUsuario.php");
		}
	}
}
