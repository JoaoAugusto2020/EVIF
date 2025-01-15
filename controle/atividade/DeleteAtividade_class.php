<?php
include_once("modelo/AtividadeDAO_class.php");

class DeleteAtividade{

	public function __construct(){
    if (isset($_GET["conf"])){
			if ($_GET["conf"] == "sim"){
				//enviar é o botão de submit
        
        $a = new Atividade();
				$a->setIdAtividade($_GET["id"]);

        $dao = new AtividadeDAO();
				$dao->excluir($a);

        //echo "<script>window.location.href='atividade.php?fun=list';</script>";
				echo "<script>javascript:history.go(-2);</script>";
			}
		} else {
			//encaminhar para a página de confirmação de exclusão

			$a = new Atividade();
			$dao = new AtividadeDAO();
			$a = $dao->exibir($_GET["id"]);

			include_once("visao/atividade/confirmDelete.php");
		}
  }
}
