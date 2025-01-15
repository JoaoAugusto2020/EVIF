<?php
	include_once("modelo/AtividadeDAO_class.php");

	class ExibirAtividade{

		public function __construct(){
			$dao = new AtividadeDAO();
			$a = $dao->exibir($_GET["id"]);

			include_once("visao/atividade/exibirAtividade.php");	
		}
	}
?>