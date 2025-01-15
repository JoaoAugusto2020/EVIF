<?php
include_once("modelo/AtividadeDAO_class.php");
include_once("modelo/CursoDAO_class.php");
include_once("modelo/UsuarioDAO_class.php");
include_once("modelo/AbertocursosDAO_class.php");

class UpdateAtividade{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit
			$u = new Usuario();
			$daoU = new UsuarioDAO();
			$u = $daoU->exibir($_SESSION["usuario"]);

			$a = new Atividade();
			$a->setIdatividade($_POST['id']);
			$a->setTipo($_POST['tipo']);
			$a->setTitulo($_POST['title']);
			$a->setProfessor($u->getNome());
			$a->setDescricao($_POST['descricao']);
			$a->setLocal($_POST['local']);
			$a->setDatainicio($_POST['datainicio']);
			$a->setDatafim($_POST['datafim']);
			if($_POST['aberto']=="Não" || $_POST['tipo']=="Viagem") $a->setAberto("Não");
			else $a->setAberto("Sim");

			$daoA = new AtividadeDAO();
			$daoA->alterar($a);

			//criar curso-atividade
			if($_POST['aberto']=="Não"){
				$titulo = $_POST['title'];
				$cursos = $_POST['cursos'];

				//apaga todos curso-atividade dessa atividade
				$ac = new Abertocursos();
				$ac->setTitulo($titulo);

				$daoAC = new AbertocursosDAO();
				$daoAC->excluir($ac);

				//adiciona os novos atualizados
				foreach ($cursos as $curso){
					$ac = new Abertocursos();
					$ac->setTitulo($titulo);
					$ac->setCurso($curso);

					$daoAC2 = new AbertocursosDAO();
					$daoAC2->cadastrar($ac);
				}
			}
			
			echo "<script>javascript:history.go(-2);</script>";
			//echo "<script>window.location.href='atividade.php?fun=listProf';</script>";
		} else {
			$daoA = new AtividadeDAO();
			$a = $daoA->exibir($_GET["id"]);

			$daoC = new CursoDAO();
			$listaC = $daoC->listar();
			
      include_once("visao/atividade/formUpdateAtividade.php");
		}
	}
}
