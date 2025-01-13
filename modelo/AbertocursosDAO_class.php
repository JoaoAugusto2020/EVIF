<<<<<<< HEAD
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
				"INSERT INTO abertocursos(idatividade, idcurso, periodo)
				VALUES (:idatividade, :idcurso, :periodo)"
			);
			//:abertocursos - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
			$stmt->bindValue(":idatividade", $abertocursos->getIdatividade());
			$stmt->bindValue(":idcurso", $abertocursos->getIdcurso());
			$stmt->bindValue(":periodo", $abertocursos->getPeriodo());

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
        periodo=:periodo WHERE
				idatividade=:idatividade AND idcurso=:idcurso"
			);

			//ligamos as âncoras aos valores de abertocursos
      $stmt->bindValue(":idatividade", $abertocursos->getIdatividade());
			$stmt->bindValue(":idcurso", $abertocursos->getIdcurso());
      $stmt->bindValue(":periodo", $abertocursos->getPeriodo());

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
			$num = $this->con->exec("DELETE FROM abertocursos WHERE idatividade = " .$abertocursos->getIdatividade(). " AND idcurso = " .$abertocursos->getIdcurso());
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
				$a->setIdatividade($linha["idatividade"]);
        $a->setIdcurso($linha["idcurso"]);
				$a->setPeriodo($linha["periodo"]);
				$lista[] = $a;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idatividade, $idcurso){
		try {
			$lista = $this->con->query("SELECT * FROM abertocursos WHERE idatividade = " .$idatividade. " AND idcurso = " .$idcurso);

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$a = new Abertocursos();
			$a->setIdatividade($dado[0]["idatividade"]);
			$a->setIdcurso($dado[0]["idcurso"]);
			$a->setPeriodo($dado[0]["periodo"]);

			return $a;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
=======
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
				"INSERT INTO abertocursos(idatividade, idcurso, periodo)
				VALUES (:idatividade, :idcurso, :periodo)"
			);
			//:abertocursos - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
			$stmt->bindValue(":idatividade", $abertocursos->getIdatividade());
			$stmt->bindValue(":idcurso", $abertocursos->getIdcurso());
			$stmt->bindValue(":periodo", $abertocursos->getPeriodo());

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
        periodo=:periodo WHERE
				idatividade=:idatividade AND idcurso=:idcurso"
			);

			//ligamos as âncoras aos valores de abertocursos
      $stmt->bindValue(":idatividade", $abertocursos->getIdatividade());
			$stmt->bindValue(":idcurso", $abertocursos->getIdcurso());
      $stmt->bindValue(":periodo", $abertocursos->getPeriodo());

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
			$num = $this->con->exec("DELETE FROM abertocursos WHERE idatividade = " .$abertocursos->getIdatividade(). " AND idcurso = " .$abertocursos->getIdcurso());
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
				$a->setIdatividade($linha["idatividade"]);
        $a->setIdcurso($linha["idcurso"]);
				$a->setPeriodo($linha["periodo"]);
				$lista[] = $a;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idatividade, $idcurso){
		try {
			$lista = $this->con->query("SELECT * FROM abertocursos WHERE idatividade = " .$idatividade. " AND idcurso = " .$idcurso);

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$a = new Abertocursos();
			$a->setIdatividade($dado[0]["idatividade"]);
			$a->setIdcurso($dado[0]["idcurso"]);
			$a->setPeriodo($dado[0]["periodo"]);

			return $a;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
>>>>>>> master
