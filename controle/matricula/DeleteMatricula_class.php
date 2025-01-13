<?php
include_once("modelo/MatriculaDAO_class.php");

class DeleteMatricula{

	public function __construct(){
    $dao = new MatriculaDAO();

    if($dao->existe($_GET["matricula"])){    
      if (isset($_GET["conf"])){
        if ($_GET["conf"] == "sim"){
          //enviar é o botão de submit

          $dao2 = new MatriculaDAO();
          $dao2->excluir($_GET["matricula"]);

          echo "<script>javascript:history.go(-2);</script>";
        }
      } else {
        //encaminhar para a página de confirmação de exclusão

        include_once("visao/matricula/confirmDelete.php");
      }
      
    } else {
      echo "<script>alert('Essa matricula não existe!');</script>";
      echo "<script>javascript:history.go(-1);</script>";
    }
  }
}
