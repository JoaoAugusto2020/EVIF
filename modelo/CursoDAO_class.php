<?php
include_once("ConnectionFactory_class.php"); //PDO
include_once("Curso_class.php"); //entidade

class CursoDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados

	public $con = null; //obj recebe conexão

	public function __construct(){
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	//cadastrar
	public function cadastrar($curso){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO curso(nome, periodos)
				VALUES (:nome, :periodos)"
			);
			//:nome - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
      $stmt->bindValue(":nome", $curso->getNome());
			$stmt->bindValue(":periodos", $curso->getPeriodos());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($curso){
		try {
			$stmt = $this->con->prepare(
				"UPDATE curso SET 
				nome=:nome,
        periodos=:periodos WHERE
				idcurso=:idcurso"
			);

			//ligamos as âncoras aos valores de curso
      $stmt->bindValue(":idcurso", $curso->getIdcurso());
      $stmt->bindValue(":nome", $curso->getNome());
      $stmt->bindValue(":periodos", $curso->getPeriodos());

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
	public function excluir($curso){
		try {
			$num = $this->con->exec("DELETE FROM curso WHERE idcurso = " . $curso->getIdcurso());
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
				$dados = $this->con->query("SELECT * FROM curso");
				//dataset (conjunto de dados) com todos os dados
				//query() é função PDO, executa SQL
			} else {
				$dados = $this->con->query($query);
				//se listar receber parâmetro este será uma SQL 
				//SQL específica
			}
			$lista = array(); //crio chamando função array()

			/*for($i = 0; $i<$dados.lenght; $i++){
				$c->setNome($dados[i][1]);
			}*/
			
			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$c = new Curso();
				$c->setIdcurso($linha["idcurso"]);
        $c->setNome($linha["nome"]);
				$c->setPeriodos($linha["periodos"]);
				$lista[] = $c;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idcurso){
		try {
			$lista = $this->con->query("SELECT * FROM curso WHERE idcurso = " . $idcurso);

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$c = new Curso();
			$c->setIdcurso($dado[0]["idcurso"]);
			$c->setNome($dado[0]["nome"]);
			$c->setPeriodos($dado[0]["periodos"]);

			return $c;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
