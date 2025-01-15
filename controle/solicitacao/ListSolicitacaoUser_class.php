<?php
	include_once("modelo/SolicitacaoDAO_class.php");
	include_once("modelo/UsuarioDAO_class.php");
	
	class ListSolicitacaoUser{
	
		public function __construct(){
			$dao = new SolicitacaoDAO();
			$listaS = $dao->listarUser($_SESSION['usuario']);
			//array de objetos do tipo veiculo
			
			if($listaS!=NULL){
				include_once("visao/solicitacao/listSolicitacaoUser.php");
			}		
		}
	}
?>


