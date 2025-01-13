<?php
include_once("modelo/UsuarioDAO_class.php");
include_once("modelo/CursoDAO_class.php");
include_once("modelo/MatriculaDAO_class.php");

class UpdateUsuario{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit
			// $daoM = new MatriculaDAO();
			// $m = new Matricula();

			// $m->setIdusuario($_SESSION['usuario']);
			// $m->setIdcurso($_POST["curso"]);
			// $m->setMatricula($_POST["matricula"]);
			// $m->setPeriodo($_POST["periodo"]);
			// $daoM->cadastrar($m);

			$u = new Usuario();
			$u->setNome($_POST["nome"]);
			$u->setEmail($_POST["email"]);
			$u->setSenha($_POST["senha"]);
			if($_POST["nivel"] > 0){
				//criar solicitação
			}
			//$u->setIdUsuario($_POST["idUsuario"]); //a diferença é que no outro essa linha está oculta

			$dao = new UsuarioDAO();
			$dao->alterar($u);

			echo "<script>javascript:history.go(-3);</script>";
			
			//$lista = $dao->listar();
			//include_once("visao/usuario/listaUsuario.php");
			//para o funcionamento da visão da Listagem de Usuarios
		} else {
			//se entrar no else significa que nenhum 
			//formulário foi enviado, ou seja, a pessoa ainda não cadastrou o Usuario

			$id = $_SESSION['usuario'];
      $daoU = new UsuarioDAO();
			$daoC = new CursoDAO();
			$daoM = new MatriculaDAO();
			
			$u = $daoU->exibir($id);
			$listaC = $daoC->listar();
			$listaM = $daoM->listar();

			include_once("visao/usuario/formUpdateUsuario.php");
		}
	}
}
