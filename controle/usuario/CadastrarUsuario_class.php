<?php
include_once("modelo/UsuarioDAO_class.php");

class CadastrarUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			$u = new Usuario();
			$u->setNome($_POST["nome"]);
			$u->setEmail($_POST["email"]);
			$u->setSenha($_POST["senha"]);
			if(isset($_POST["nivel"])) $u->setNivel($_POST["nivel"]);
			else $u->setNivel(0);
			//$u->setIdUsuario($_POST["idUsuario"]); //a diferença é que no outro essa linha está oculta

			$dao = new UsuarioDAO();
			$dao->cadastrar($u);

			$status = "Usuario " . mb_strtoupper($u->getNome(), 'UTF-8') . " cadastrado com sucesso.";

			$lista = $dao->listar();
			include_once("visao/usuario/listaUsuario.php");
			//para o funcionamento da visão da Listagem de Usuarios
		} else {
			//se entrar no else significa que nenhum 
			//formulário foi enviado, ou seja, a pessoa ainda não cadastrou o Usuario

      include_once("visao/usuario/formCadastroUsuario.php");
		}
	}
}
