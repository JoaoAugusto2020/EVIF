<?php
	include_once("modelo/SolicitacaoDAO_class.php");
	include_once("modelo/UsuarioDAO_class.php");
	
	class ListSolicitacao{
	
		public function __construct(){
			$dao = new SolicitacaoDAO();
			$listaS = $dao->listar();
			//array de objetos do tipo veiculo
			
			if($listaS==NULL){
				echo "<h1 id='titulo'> Não há solicitações cadastradas! </h1>";
				echo "<div class='espaco-lg'></div>";
			}else{
				include_once("visao/solicitacao/listSolicitacao.php");
			}		
		}
	}
?>


