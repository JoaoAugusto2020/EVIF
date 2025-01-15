<?php
include_once("modelo/UsuarioDAO_class.php");
include_once("modelo/CursoDAO_class.php");
include_once("modelo/MatriculaDAO_class.php");

class ConfigUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit
			$u = new Usuario();
			$u->setIdusuario($_SESSION["usuario"]);
			$u->setNome($_POST["nome"]);
			$u->setEmail($_POST["email"]);

			$dao = new UsuarioDAO();
			$dao->alterar($u);

			echo "<script>javascript:history.go(-1);</script>";
		} else {
			//se entrar no else significa que nenhum 
			//formulário foi enviado, ou seja, a pessoa ainda não cadastrou o Usuario

			$id = $_SESSION['usuario'];
      $daoU = new UsuarioDAO();
			$daoC = new CursoDAO();
			$daoM = new MatriculaDAO();
			
			$u = $daoU->exibir($id);
			$listaC = $daoC->listar();
			$listaM = $daoM->exibir($id);

			include_once("visao/usuario/formConfigUsuario.php");
		}
	}
}
