<?php
include_once("modelo/CursoDAO_class.php");

class CreateCurso{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit

			$c = new Curso();
			$c->setNome($_POST["nome"]);
			$c->setPeriodos($_POST["periodos"]);

			$dao = new CursoDAO();
			$dao->cadastrar($c);

			echo "<script>window.location.href='curso.php?fun=list';</script>";
		} else {

      include_once("visao/curso/formCreateCurso.php");
		}
	}
}
