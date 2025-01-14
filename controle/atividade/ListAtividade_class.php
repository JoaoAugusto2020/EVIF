<?php
	include_once("modelo/AtividadeDAO_class.php");
	
	class ListAtividade{
	
		public function __construct(){
			$dao = new AtividadeDAO();
			$lista = $dao->listar();
			//array de objetos do tipo veiculo
			
			if($lista==NULL){
				echo "<h1 id='titulo'> Não há Atividades cadastrados! </h1>";
				echo "<div class='espaco-lg'></div>";
			}else{
				include_once("visao/atividade/listAtividade.php");
			}		
		}
	}
?>


