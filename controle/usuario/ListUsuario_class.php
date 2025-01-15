<?php
	include_once("modelo/UsuarioDAO_class.php");
	
	class ListUsuario{
	
		public function __construct(){
			$dao = new UsuarioDAO();
			$lista = $dao->listar();
			//array de objetos do tipo veiculo
			
			if($lista==NULL){
				echo "<h1 id='titulo'> Não há usuários cadastrados! </h1>";
				echo "<div class='espaco-lg'></div>";
			}else{
				include_once("visao/usuario/listUsuario.php");
				echo "<p class='text-center'><a class='link' href='index.php?fun=adm'>Voltar Adm</a></p>";
			}		
		}
	}
?>


