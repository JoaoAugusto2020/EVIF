<?php
include_once("modelo/MatriculaDAO_class.php");

class DeleteMatricula{

	public function __construct(){
    if (isset($_GET["conf"])){
			if ($_GET["conf"] == "sim"){
				//enviar é o botão de submit
        
        $m = new Matricula();
				$m->setMatricula($_GET["matricula"]);

        $dao = new MatriculaDAO();
				$dao->excluir($m);

        echo "<script>javascript:history.go(-2);</script>";
			}
		} else {
			//encaminhar para a página de confirmação de exclusão

			$m = new Matricula();
			$m->setMatricula($_POST["delmatricula"]);

			include_once("visao/matricula/confirmDelete.php");
		}
  }
}
