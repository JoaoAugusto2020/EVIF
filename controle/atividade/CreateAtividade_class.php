<?php
include_once("modelo/AtividadeDAO_class.php");
include_once("modelo/CursoDAO_class.php");
include_once("modelo/UsuarioDAO_class.php");
include_once("modelo/AbertocursosDAO_class.php");

class CreateAtividade{

	public function __construct(){
		if (isset($_POST["enviar"])){
			//enviar é o botão de submit
			$u = new Usuario();
			$daoU = new UsuarioDAO();
			$u = $daoU->exibir($_SESSION["usuario"]);

			$a = new Atividade();
			$a->setTipo($_POST['tipo']);
			$a->setTitulo($_POST['title']);
			$a->setProfessor($u->getNome());
			$a->setDescricao($_POST['descricao']);
			$a->setLocal($_POST['local']);
			$a->setDatainicio($_POST['datainicio']);
			$a->setDatafim($_POST['datafim']);
			if($_POST['aberto']==0 && $_POST['tipo']!="Viagem") $a->setAberto("Sim");
			else $a->setAberto("Não");

			$daoA = new AtividadeDAO();
			$daoA->cadastrar($a);
			
			//criar curso-atividade
			if($_POST['aberto'] != 0){
				$titulo = $_POST['title'];
				$cursos = $_POST['cursos'];

				foreach ($cursos as $curso){
					$ac = new Abertocursos();
					$ac->setTitulo($titulo);
					$ac->setCurso($curso);

					$daoAC = new AbertocursosDAO();
					$daoAC->cadastrar($ac);
				}
			}
			
			echo "<script>javascript:history.go(-2);</script>";
			//echo "<script>window.location.href='atividade.php?fun=listProf';</script>";
		} else {
			$daoC = new CursoDAO();
			$listaC = $daoC->listar();
			
      include_once("visao/atividade/formCreateAtividade.php");
		}
	}
}
