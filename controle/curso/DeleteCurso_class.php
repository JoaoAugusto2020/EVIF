<?php
include_once("modelo/CursoDAO_class.php");

class DeleteCurso{

	public function __construct(){
    if (isset($_GET["conf"])){
			if ($_GET["conf"] == "sim"){
				//enviar é o botão de submit
        
        $c = new Curso();
				$c->setIdcurso($_GET["id"]);

        $dao = new CursoDAO();
				$dao->excluir($c);

        echo "<script>window.location.href='curso.php?fun=list';</script>";
			}
		} else {
			//encaminhar para a página de confirmação de exclusão

			$c = new Curso();
			$dao = new CursoDAO();
			$c = $dao->exibir($_GET["id"]);

			include_once("visao/Curso/confirmDelete.php");
		}
  }
}
