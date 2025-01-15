<?php
include_once("modelo/SolicitacaoDAO_class.php");

class AceitarSolicitacao{

	public function __construct(){
		//pegando os dados da solicitacao
		$s = new Solicitacao();
		$daoS = new SolicitacaoDAO();
		$s = $daoS->exibir($_GET["id"]);

		//pegando os dados atuais do usuário
		$u = new Usuario();
		$daoU = new UsuarioDAO();
		$u = $daoU->exibir($s->getIdusuario());

		//atualizando o usuário
		$u->setNivel($s->getNivel());
		$daoU2 = new UsuarioDAO();
		$daoU2->alterar($u);

		//atualizando a solicitação
		$s->setStatus("Deferido");
		$daoS2 = new SolicitacaoDAO();
		$daoS2->alterar($s);

		echo "<script>javascript:history.go(-1);</script>";
	}
}
