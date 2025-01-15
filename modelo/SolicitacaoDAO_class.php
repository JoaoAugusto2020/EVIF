<?php
include_once("ConnectionFactory_class.php"); //PDO
include_once("Solicitacao_class.php"); //entidade

class SolicitacaoDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados

	public $con = null; //obj recebe conexão

	public function __construct(){
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	//cadastrar
	public function cadastrar($solicitacao){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO solicitacao (idusuario, nivel, status)
				VALUES (:idusuario, :nivel, :status)"
			);
			//:nome - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
      $stmt->bindValue(":idusuario", $solicitacao->getIdusuario());
			$stmt->bindValue(":nivel", $solicitacao->getNivel());
			$stmt->bindValue(":status", $solicitacao->getStatus());

			echo "<script>alert('solicitacao cadastrada!')</script>";

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($solicitacao){
		try {
			$stmt = $this->con->prepare(
				"UPDATE solicitacao SET 
				idusuario=:idusuario,
        nivel=:nivel,
				status=:status WHERE
				idsolicitacao=:idsolicitacao"
			);

			//ligamos as âncoras aos valores de solicitacao
      $stmt->bindValue(":idsolicitacao", $solicitacao->getIdsolicitacao());
      $stmt->bindValue(":idusuario", $solicitacao->getIdusuario());
      $stmt->bindValue(":nivel", $solicitacao->getNivel());
			$stmt->bindValue(":status", $solicitacao->getStatus());

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
	public function excluir($solicitacao){
		try {
			$num = $this->con->exec("DELETE FROM solicitacao WHERE idsolicitacao = " . $solicitacao->getIdsolicitacao());
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
				$dados = $this->con->query("SELECT * FROM solicitacao");
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
				$s = new Solicitacao();
				$s->setIdsolicitacao($linha["idsolicitacao"]);
        $s->setIdusuario($linha["idusuario"]);
				$s->setNivel($linha["nivel"]);
				$s->setStatus($linha["status"]);
				$lista[] = $s;
			}

			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//listar
	public function listarUser($idusuario){
		try{
			$dados = $this->con->query("SELECT * FROM solicitacao WHERE idusuario='$idusuario'");
			$lista = array(); //crio chamando função array()

			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$s = new Solicitacao();
				$s->setIdsolicitacao($linha["idsolicitacao"]);
				$s->setIdusuario($linha["idusuario"]);
				$s->setNivel($linha["nivel"]);
				$s->setStatus($linha["status"]);
				$lista[] = $s;
			}

			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idsolicitacao){
		try {
			$lista = $this->con->query("SELECT * FROM solicitacao WHERE idsolicitacao = " . $idsolicitacao);
			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$solicitacao = new Solicitacao();
			$solicitacao->setIdsolicitacao($dado[0]["idsolicitacao"]);
			$solicitacao->setIdusuario($dado[0]["idusuario"]);
			$solicitacao->setNivel($dado[0]["nivel"]);
			$solicitacao->setStatus($dado[0]["status"]);

			return $solicitacao;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
