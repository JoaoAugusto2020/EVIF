<?php
	include_once("modelo/AtividadeDAO_class.php");
	include_once("modelo/Usuario_class.php");
	
	class ListAtividadeProf{
	
		public function __construct(){
			$daoU = new UsuarioDAO();
			$u = new Usuario();
			$u = $daoU->exibir($_SESSION["usuario"]);

			$daoA = new AtividadeDAO();
			$lista = $daoA->listarProf($u);
			//array de objetos do tipo veiculo
			
			if($lista==NULL){
				echo "<h1 id='titulo'> Não há atividades cadastrados por este usuário! </h1>";
				echo "<div class='espaco-lg'></div>";
			}else{
				include_once("visao/atividade/listAtividadeProf.php");
			}		
		}
	}
?>


