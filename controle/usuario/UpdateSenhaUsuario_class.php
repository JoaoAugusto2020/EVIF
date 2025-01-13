<?php
include_once("modelo/UsuarioDAO_class.php");

class UpdateSenhaUsuario{

	public function __construct(){
		if (isset($_POST["enviar"]) && isset($_POST["senhaAntiga"])){
			//enviar é o botão de submit
			$u = new Usuario();
			$u->setIdusuario($_SESSION["usuario"]);
			$senhaAntiga = $_POST["senhaAntiga"];
			$novaSenha = $_POST["novaSenha"];
			$confnovaSenha = $_POST["confnovaSenha"];

			$dao = new UsuarioDAO();
			$dao->alterarSenha($u, $senhaAntiga, $novaSenha, $confnovaSenha);

			echo "<script>javascript:history.go(-1);</script>";
		} else {
			//se entrar no else significa que nenhum 
			//formulário foi enviado, ou seja, a pessoa ainda não cadastrou o Usuario

			include_once("visao/usuario/formUpdateUsuario.php");
		}
	}
}
