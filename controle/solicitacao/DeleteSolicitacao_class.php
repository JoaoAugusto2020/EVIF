<?php
include_once("modelo/SolicitacaoDAO_class.php");

class DeleteSolicitacao{

	public function __construct(){
    if (isset($_GET["conf"])){
			if ($_GET["conf"] == "sim"){
				//enviar é o botão de submit
        
        $s = new Solicitacao();
				$s->setIdSolicitacao($_GET["id"]);

        $dao = new SolicitacaoDAO();
				$dao->excluir($s);

        // echo "<script>window.location.href='solicitacao.php?fun=list';</script>";
				echo "<script>javascript:history.go(-2);</script>";
			}
		} else {
			//encaminhar para a página de confirmação de exclusão

			$s = new Solicitacao();
			$dao = new SolicitacaoDAO();
			$s = $dao->exibir($_GET["id"]);

			include_once("visao/Solicitacao/confirmDelete.php");
		}
  }
}
