<?php
include_once("modelo/InscricaoDAO_class.php");

class CreateInscricao{
	public function __construct(){
		//pegando os dados da solicitacao
		$i = new Inscricao();
		$i->setIdatividade($_GET['id']);
		$i->setIdusuario($_SESSION['usuario']);

		$daoI = new InscricaoDAO();
		$daoI->cadastrar($i);

		// echo "<script>window.location.href='index.php';</script>";
		echo "<script>javascript:history.go(-1);</script>";
	}
}
