<?php
include_once("ConnectionFactory_class.php"); //PDO
include_once("Abertocursos_class.php"); //entidade

class AbertocursosDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados

	public $con = null; //obj recebe conexão

	public function __construct(){
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	//cadastrar
	public function cadastrar($abertocursos){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO abertocursos(curso, titulo)
				VALUES (:curso, :titulo)"
			);
			//:abertocursos - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo

			//$stmt->bindValue(":idatividade", $abertocursos->getIdatividade());
			$stmt->bindValue(":curso", $abertocursos->getCurso());
			$stmt->bindValue(":titulo", $abertocursos->getTitulo());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($abertocursos){
		try {
			$stmt = $this->con->prepare(
				"UPDATE abertocursos SET
				curso=:curso, 
        titulo=:titulo WHERE
				idatividadecurso=:idatividadecurso"
			);

			//ligamos as âncoras aos valores de abertocursos
      $stmt->bindValue(":idatividadecurso", $abertocursos->getIdatividadecurso());
			$stmt->bindValue(":curso", $abertocursos->getCurso());
      $stmt->bindValue(":titulo", $abertocursos->getTitulo());

			$this->con->beginTransaction();
			$stmt->execute(); //execução do SQL	
			$this->con->commit();
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//excluir
	public function excluir($abertocursos){
		try {
			$titulo = $abertocursos->getTitulo();
			$num = $this->con->exec("DELETE FROM abertocursos WHERE titulo='$titulo'");
			//numero de linhas afetadas pelo comando

			if ($num >= 1) {
				return 1;
			} else {
				return 0;
			}
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//listar
	public function listar($query = null){
		//se não recebe parâmetro (ou seja, uma consulto personalizada)
		//$query recebe nulo
		try {
			if ($query == null) {
				$dados = $this->con->query("SELECT * FROM abertocursos");
				//dataset (conjunto de dados) com todos os dados
				//query() é função PDO, executa SQL
			} else {
				$dados = $this->con->query($query);
				//se listar receber parâmetro este será uma SQL 
				//SQL específica
			}
			$lista = array(); //crio chamando função array()

			/*for($i = 0; $i<$dados.lenght; $i++){
				$a->setabertocursos($dados[i][1]);
			}*/
			
			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$a = new Abertocursos();
				$a->setIdatividadecurso($linha["idatividadecurso"]);
        $a->setCurso($linha["curso"]);
				$a->setTitulo($linha["titulo"]);
				$lista[] = $a;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idatividadecurso, $curso){
		try {
			$lista = $this->con->query("SELECT * FROM abertocursos WHERE idatividadecurso = " .$idatividadecurso);

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$a = new Abertocursos();
			$a->setIdatividadecurso($dado[0]["idatividadecurso"]);
			$a->setCurso($dado[0]["curso"]);
			$a->setTitulo($dado[0]["titulo"]);

			return $a;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
