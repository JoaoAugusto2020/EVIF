<?php
include_once("modelo/InscricaoDAO_class.php");

class DeleteInscricao{

	public function __construct(){
    if (isset($_GET["conf"])){
			if ($_GET["conf"] == "sim"){
				//enviar é o botão de submit
        
        $i = new Inscricao();
				$i->setIdInscricao($_GET["id"]);

        $dao = new InscricaoDAO();
				$dao->excluir($i);

        // echo "<script>window.location.href='inscricao.php?fun=list';</script>";
				echo "<script>javascript:history.go(-2);</script>";
			}
		} else {
			//encaminhar para a página de confirmação de exclusão

			$i = new Inscricao();
			$dao = new InscricaoDAO();
			$i = $dao->exibir($_GET["id"]);

			include_once("visao/Inscricao/confirmDelete.php");
		}
  }
}
