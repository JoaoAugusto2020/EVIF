<?php
include_once("modelo/UsuarioDAO_class.php");

class CreateUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			$u = new Usuario();
			$u->setNome($_POST["nome"]);
			$u->setEmail($_POST["email"]);
			$u->setSenha($_POST["senha"]);
			if(isset($_POST["nivel"])) $u->setNivel($_POST["nivel"]);
			else $u->setNivel(0);

			$dao = new UsuarioDAO();
			$dao->cadastrar($u);

			echo "<script>javascript:history.go(-2);</script>";
		} else {

      include_once("visao/usuario/formCreateUsuario.php");
		}
	}
}
