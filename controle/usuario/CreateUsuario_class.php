<?php
include_once("modelo/UsuarioDAO_class.php");

class CreateUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			// $u = new Usuario();
			// $u->setNome($_POST["nome"]);
			// $u->setEmail($_POST["email"]);
			// $u->setSenha($_POST["senha"]);
			// if(isset($_POST["nivel"])) $u->setNivel($_POST["nivel"]);
			// else $u->setNivel(0);
			// //$u->setIdUsuario($_POST["idUsuario"]); //a diferença é que no outro essa linha está oculta

			// $dao = new UsuarioDAO();
			// $dao->cadastrar($u);
			// $dao->signin($u);

			// echo "<script>javascript:history.go(-3);</script>";
			
			//$lista = $dao->listar();
			//include_once("visao/usuario/listaUsuario.php");
			//para o funcionamento da visão da Listagem de Usuarios
		} else {
			//se entrar no else significa que nenhum 
			//formulário foi enviado, ou seja, a pessoa ainda não cadastrou o Usuario

      include_once("visao/usuario/formCreateUsuario.php");
		}
	}
}
