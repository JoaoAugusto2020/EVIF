<<<<<<< HEAD
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
				"INSERT INTO matricula(idusuario, idcurso, matricula, periodo)
				VALUES (:idusuario, :idcurso, :matricula, :periodo)"
			);
			//:matricula - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
			$stmt->bindValue(":idusuario", $matricula->getIdusuario());
			$stmt->bindValue(":idcurso", $matricula->getIdcurso());
      $stmt->bindValue(":matricula", $matricula->getMatricula());
			$stmt->bindValue(":periodo", $matricula->getPeriodo());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($matricula){
		try {
			$stmt = $this->con->prepare(
				"UPDATE matricula SET 
				matricula=:matricula,
        periodo=:periodo WHERE
				idusuario=:idusuario AND idcurso=:idcurso"
			);

			//ligamos as âncoras aos valores de matricula
      $stmt->bindValue(":idusuario", $matricula->getIdusuario());
			$stmt->bindValue(":idcurso", $matricula->getIdcurso());
      $stmt->bindValue(":matricula", $matricula->getMatricula());
      $stmt->bindValue(":periodo", $matricula->getPeriodo());

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
			$num = $this->con->exec("DELETE FROM matricula WHERE idusuario = " .$matricula->getIdusuario(). " AND idcurso = " .$matricula->getIdcurso());
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
				$m->setPeriodo($linha["periodo"]);
				$lista[] = $m;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idusuario, $idcurso){
		try {
			$lista = $this->con->query("SELECT * FROM matricula WHERE idusuario = " .$idusuario. " AND idcurso = " .$idcurso);
			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			if(count($dado) == 0) return;

			$m = new Matricula();
			$m->setIdusuario($dado["idusuario"]);
			$m->setIdcurso($dado["idcurso"]);
			$m->setMatricula($dado["matricula"]);
			$m->setPeriodo($dado["periodo"]);

			return $m;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
=======
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
				"INSERT INTO matricula(idusuario, idcurso, matricula, periodo)
				VALUES (:idusuario, :idcurso, :matricula, :periodo)"
			);
			//:matricula - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
			$stmt->bindValue(":idusuario", $matricula->getIdusuario());
			$stmt->bindValue(":idcurso", $matricula->getIdcurso());
      $stmt->bindValue(":matricula", $matricula->getMatricula());
			$stmt->bindValue(":periodo", $matricula->getPeriodo());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($matricula){
		try {
			$stmt = $this->con->prepare(
				"UPDATE matricula SET 
				matricula=:matricula,
        periodo=:periodo WHERE
				idusuario=:idusuario AND idcurso=:idcurso"
			);

			//ligamos as âncoras aos valores de matricula
      $stmt->bindValue(":idusuario", $matricula->getIdusuario());
			$stmt->bindValue(":idcurso", $matricula->getIdcurso());
      $stmt->bindValue(":matricula", $matricula->getMatricula());
      $stmt->bindValue(":periodo", $matricula->getPeriodo());

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
			$num = $this->con->exec("DELETE FROM matricula WHERE matricula=" .$matricula->getMatricula(). " AND idusuario=" .$_SESSION["usuario"]);
			//numero de linhas afetadas pelo comando

			if($num > 0){
				echo "<script>alert('Excluido com sucesso!');</script>";
			} else {
				echo "<script>alert('Essa matricula não pertence a você!');</script>";
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
				$m->setPeriodo($linha["periodo"]);
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
				$m->setPeriodo($linha["periodo"]);
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
			
			if(count($lista) > 0) return true;
			else return false;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
>>>>>>> master
