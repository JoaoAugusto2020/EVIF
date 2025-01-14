<?php
include_once("ConnectionFactory_class.php"); //PDO
include_once("Matricula_class.php"); //entidade

class MatriculaDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados

	public $con = null; //obj recebe conexão

	public function __construct(){
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	//cadastrar
	public function cadastrar($matricula){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO matricula(idusuario, idcurso, matricula)
				VALUES (:idusuario, :idcurso, :matricula)"
			);
			//:matricula - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
			$stmt->bindValue(":idusuario", $matricula->getIdusuario());
			$stmt->bindValue(":idcurso", $matricula->getIdcurso());
      $stmt->bindValue(":matricula", $matricula->getMatricula());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/

			echo "<script>alert('Matricula cadastrada com sucesso!');</script>";
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($matricula){
		try {
			$stmt = $this->con->prepare(
				"UPDATE matricula SET 
				matricula=:matricula WHERE
				idusuario=:idusuario AND idcurso=:idcurso"
			);

			//ligamos as âncoras aos valores de matricula
      $stmt->bindValue(":idusuario", $matricula->getIdusuario());
			$stmt->bindValue(":idcurso", $matricula->getIdcurso());
      $stmt->bindValue(":matricula", $matricula->getMatricula());

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
	public function excluir($matricula){
		try {
			$stmt = $this->con->prepare(
				"DELETE FROM matricula WHERE 
				matricula=:matricula AND idusuario=:idusuario"
			);

      $stmt->bindValue(":idusuario", $_SESSION['usuario']);
      $stmt->bindValue(":matricula", $matricula->getMatricula());

			$this->con->beginTransaction();
			$stmt->execute(); //execução do SQL	
			$this->con->commit();

			echo "<script>alert('Excluido com sucesso!');</script>";
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
				$dados = $this->con->query("SELECT * FROM matricula");
				//dataset (conjunto de dados) com todos os dados
				//query() é função PDO, executa SQL
			} else {
				$dados = $this->con->query($query);
				//se listar receber parâmetro este será uma SQL 
				//SQL específica
			}
			$lista = array(); //crio chamando função array()

			/*for($i = 0; $i<$dados.lenght; $i++){
				$m->setmatricula($dados[i][1]);
			}*/
			
			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$m = new Matricula();
				$m->setIdusuario($linha["idusuario"]);
        $m->setIdcurso($linha["idcurso"]);
				$m->setMatricula($linha["matricula"]);
				$lista[] = $m;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir Matriculas 
	public function exibir($idusuario){
		try {
			$dados = $this->con->query("SELECT * FROM matricula WHERE idusuario = ".$idusuario);
			$lista = array();
			
			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$m = new Matricula();
				$m->setIdusuario($linha["idusuario"]);
        $m->setIdcurso($linha["idcurso"]);
				$m->setMatricula($linha["matricula"]);
				$lista[] = $m;
			}
			
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//existe
	public function existe($matricula){
		try {
			$dados = $this->con->query("SELECT * FROM matricula WHERE matricula = ".$matricula);
			$lista = array();
			
			foreach ($dados as $linha){
				$m = new Matricula();
				$m->setIdusuario($linha["idusuario"]);
        $m->setIdcurso($linha["idcurso"]);
				$m->setMatricula($linha["matricula"]);
				$lista[] = $m;
			}

			if(count($lista) > 0) return true;
			else return false;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
