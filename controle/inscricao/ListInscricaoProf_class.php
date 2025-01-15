<?php
	include_once("modelo/InscricaoDAO_class.php");
	include_once("modelo/UsuarioDAO_class.php");
	
	class ListInscricaoProf{
	
		public function __construct(){
			$daoI = new InscricaoDAO();
			$listaI = $daoI->listarAtiv($_GET["id"]);
			//array de objetos do tipo veiculo
			
			if($listaI==NULL){
				echo "<h1 id='titulo'> Não há inscrições cadastradas! </h1>";
				echo "<div class='espaco-lg'></div>";
			}else{
				include_once("visao/inscricao/listInscricaoProf.php");
			}		
		}
	}
?>


