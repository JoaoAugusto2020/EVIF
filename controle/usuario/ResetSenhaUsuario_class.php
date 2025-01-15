<?php
include_once("modelo/UsuarioDAO_class.php");

class ResetSenhaUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			$RECOVER_CODE = 12345;

			if($_POST['recover_code'] == $RECOVER_CODE){
				$dao = new UsuarioDAO();
				$dao->resetSenha($_POST['email'], $_POST['novasenha']);
				
				$u = new Usuario();
				$u->setEmail($_POST['email']);
				$u->setSenha($_POST['novasenha']);

				$dao2 = new UsuarioDAO();
				$dao2->signin($u);
			}else{
				echo "<script>alert('O email não foi encontrado ou o código de recuperação está inválido!');</script>";
				echo "<script>javascript:history.go(-1);</script>";
			}

			echo "<script>javascript:history.go(-3);</script>";
		} else {
			//se entrar no else significa que nenhum 
			//formulário foi enviado, ou seja, a pessoa ainda não cadastrou o Usuario

			include_once("visao/usuario/formResetSenhaUsuario.php");
		}
	}
}
