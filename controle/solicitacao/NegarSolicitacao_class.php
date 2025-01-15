<?php
include_once("modelo/SolicitacaoDAO_class.php");

class NegarSolicitacao{

	public function __construct(){
		//pegando os dados da solicitacao
		$s = new Solicitacao();
		$daoS = new SolicitacaoDAO();
		$s = $daoS->exibir($_GET["id"]);

		//atualizando a solicitação
		$s->setStatus("Indeferido");
		$daoS2 = new SolicitacaoDAO();
		$daoS2->alterar($s);

		echo "<script>javascript:history.go(-1);</script>";
	}
}
