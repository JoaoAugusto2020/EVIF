<?php
include_once("modelo/UsuarioDAO_class.php");

class SignUpUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			$u = new Usuario();
			$u->setNome($_POST["nome"]);
			$u->setEmail($_POST["email"]);
			$u->setSenha($_POST["senha"]);
			$u->setNivel(0);

			$dao = new UsuarioDAO();
			$dao->cadastrar($u);
			$dao->signin($u);

			echo "<script>javascript:history.go(-3);</script>";
		} else {
			
      include_once("visao/usuario/formSignUpUsuario.php");
		}
	}
}
