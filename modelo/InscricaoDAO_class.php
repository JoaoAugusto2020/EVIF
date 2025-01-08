<?php
include_once("ConnectionFactory_class.php"); //PDO
include_once("Inscricao_class.php"); //entidade

class InscricaoDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados

	public $con = null; //obj recebe conexão

	public function __construct(){
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	//cadastrar
	public function cadastrar($inscricao){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO inscricao(idatividade, idusuario)
				VALUES (:idatividade, :idusuario)"
			);
			//:inscricao - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
			$stmt->bindValue(":idatividade", $inscricao->getIdatividade());
			$stmt->bindValue(":idusuario", $inscricao->getIdusuario());
			//$stmt->bindValue(":datainscricao", $inscricao->getDatainscricao());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($inscricao){
		try {
			$stmt = $this->con->prepare(
				"UPDATE inscricao SET 
        datainscricao=:datainscricao WHERE
				idatividade=:idatividade AND idusuario=:idusuario"
			);

			//ligamos as âncoras aos valores de inscricao
      $stmt->bindValue(":idatividade", $inscricao->getIdatividade());
			$stmt->bindValue(":idusuario", $inscricao->getIdusuario());
      $stmt->bindValue(":datainscricao", $inscricao->getdatainscricao());

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
	public function excluir($inscricao){
		try {
			$num = $this->con->exec("DELETE FROM inscricao WHERE idatividade = " .$inscricao->getIdatividade(). " AND idusuario = " .$inscricao->getIdusuario());
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
				$dados = $this->con->query("SELECT * FROM inscricao");
				//dataset (conjunto de dados) com todos os dados
				//query() é função PDO, executa SQL
			} else {
				$dados = $this->con->query($query);
				//se listar receber parâmetro este será uma SQL 
				//SQL específica
			}
			$lista = array(); //crio chamando função array()

			/*for($i = 0; $i<$dados.lenght; $i++){
				$a->setinscricao($dados[i][1]);
			}*/
			
			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$a = new Inscricao();
				$a->setIdatividade($linha["idatividade"]);
        $a->setIdusuario($linha["idusuario"]);
				$a->setDatainscricao($linha["datainscricao"]);
				$lista[] = $a;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idatividade, $idusuario){
		try {
			$lista = $this->con->query("SELECT * FROM inscricao WHERE idatividade = " .$idatividade. " AND idusuario = " .$idusuario);

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$a = new Inscricao();
			$a->setIdatividade($dado[0]["idatividade"]);
			$a->setIdusuario($dado[0]["idusuario"]);
			$a->setDatainscricao($dado[0]["datainscricao"]);

			return $a;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
