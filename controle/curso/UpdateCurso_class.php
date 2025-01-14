<?php
include_once("modelo/CursoDAO_class.php");

class UpdateCurso{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			$c = new Curso();
			$c->setNome($_POST["nome"]);
			$c->setPeriodos($_POST["periodos"]);

			$dao = new CursoDAO();
			$dao->alterar($c);

			echo "<script>window.location.href='curso.php?fun=list';</script>";
		} else {
			$dao = new CursoDAO();
			$c = $dao->exibir($_GET["id"]);
			
      include_once("visao/curso/formUpdateCurso.php");
		}
	}
}
