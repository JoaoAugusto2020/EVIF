<?php
include_once("modelo/MatriculaDAO_class.php");
include_once("modelo/UsuarioDAO_class.php");
include_once("modelo/SolicitacaoDAO_class.php");

class CreateMatricula{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			//em relação ao nível
			if($_POST["nivel"] != 0){
				//criar solicitação
				$s = new Solicitacao();
				$s->setIdusuario($_SESSION['usuario']);
				$s->setNivel($_POST["nivel"]);
				$s->setStatus("Pendente");

				$daoS = new SolicitacaoDAO();
				$daoS->cadastrar($s);

			}else{
				$u = new Usuario();
				$u->setNivel(0);
			}

			if(isset($_POST["curso"]) && $_POST["curso"] != -1){
				$m = new Matricula();
				$m->setMatricula($_POST["matricula"]);
				$m->setIdusuario($_SESSION["usuario"]);
				$m->setIdcurso($_POST["curso"]);

				$dao = new MatriculaDAO();
				$dao->cadastrar($m);
			}

			echo "<script>javascript:history.go(-1);</script>";
		} else {

      include_once("visao/matricula/formCreateMatricula.php");
		}
	}
}
