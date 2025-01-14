<?php
	include_once("modelo/CursoDAO_class.php");
	
	class ListCurso{
	
		public function __construct(){
			$dao = new CursoDAO();
			$lista = $dao->listar();
			//array de objetos do tipo veiculo
			
			if($lista==NULL){
				echo "<h1 id='titulo'> Não há cursos cadastrados! </h1>";
				echo "<div class='espaco-lg'></div>";
			}else{
				include_once("visao/curso/listCurso.php");
			}		
		}
	}
?>


