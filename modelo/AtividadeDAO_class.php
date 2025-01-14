<?php
include_once("ConnectionFactory_class.php"); //PDO
include_once("Atividade_class.php"); //entidade

class AtividadeDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados

	public $con = null; //obj recebe conexão

	public function __construct(){
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	//cadastrar
	public function cadastrar($atividade){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO atividade(tipo, titulo, professor, descricao, local, datainicio, datafim, aberto)
				VALUES (:tipo, :titulo, :professor, :descricao, :local, :datainicio, :datafim, :aberto)"
			);
			//:nome - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
      $stmt->bindValue(":tipo", $atividade->getTipo());
			$stmt->bindValue(":titulo", $atividade->getTitulo());
			$stmt->bindValue(":professor", $atividade->getProfessor());
			$stmt->bindValue(":descricao", $atividade->getDescricao());
			$stmt->bindValue(":local", $atividade->getLocal());
			$stmt->bindValue(":datainicio", $atividade->getDatainicio());
			$stmt->bindValue(":datafim", $atividade->getDatafim());
			$stmt->bindValue(":aberto", $atividade->getAberto());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/

			echo "<script>alert('Atividade criada com sucesso!');</script>";
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($atividade){
		try {
			$stmt = $this->con->prepare(
				"UPDATE atividade SET 
				tipo=:tipo, 
				titulo=:titulo, 
				professor=:professor,
        descricao=:descricao,
        local=:local,
        datainicio=:datainicio,
        datafim=:datafim,
        aberto=:aberto WHERE
				idatividade=:idatividade"
			);

			//ligamos as âncoras aos valores de atividade
      $stmt->bindValue(":tipo", $atividade->getTipo());
			$stmt->bindValue(":titulo", $atividade->getTitulo());
			$stmt->bindValue(":professor", $atividade->getProfessor());
			$stmt->bindValue(":descricao", $atividade->getDescricao());
			$stmt->bindValue(":local", $atividade->getLocal());
			$stmt->bindValue(":datainicio", $atividade->getDatainicio());
			$stmt->bindValue(":datafim", $atividade->getDatafim());
			$stmt->bindValue(":aberto", $atividade->getAberto());
			$stmt->bindValue(":idatividade", $atividade->getIdatividade());

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
	public function excluir($atividade){
		try {
			$num = $this->con->exec("DELETE FROM atividade WHERE idatividade = " . $atividade->getIdatividade());
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
				$dados = $this->con->query("SELECT * FROM atividade");
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
				$a = new Atividade();
				$a->setIdatividade($linha["idatividade"]);
        $a->setTipo($linha["tipo"]);
				$a->setTitulo($linha["titulo"]);
				$a->setProfessor($linha["professor"]);
				$a->setDescricao($linha["descricao"]);
				$a->setLocal($linha["local"]);
				$a->setDatainicio($linha["datainicio"]);
				$a->setDatafim($linha["datafim"]);
				$a->setAberto($linha["aberto"]);
				$lista[] = $a;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idatividade){
		try {
			$lista = $this->con->query("SELECT * FROM atividade WHERE idatividade = " . $idatividade);

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$a = new Atividade();
			$a->setIdatividade($dado[0]["idatividade"]);
			$a->setTipo($dado[0]["tipo"]);
			$a->setTitulo($dado[0]["titulo"]);
			$a->setProfessor($dado[0]["professor"]);
			$a->setDescricao($dado[0]["descricao"]);
			$a->setLocal($dado[0]["local"]);
			$a->setDatainicio($dado[0]["datainicio"]);
			$a->setDatafim($dado[0]["datafim"]);
			$a->setAberto($dado[0]["aberto"]);

			return $a;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
