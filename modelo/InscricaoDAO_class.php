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

			$stmt->bindValue(":idatividade", $inscricao->getIdatividade());
			$stmt->bindValue(":idusuario", $inscricao->getIdusuario());

			$this->con->beginTransaction();
			$stmt->execute(); //execução do SQL	
			$this->con->commit();

			echo "<script>alert('Inscrição realizada com sucesso!')</script>";
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
			$num = $this->con->exec("DELETE FROM inscricao WHERE idinscricao =".$inscricao->getIdinscricao());
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
	public function listar(){
		try {
			$dados = $this->con->query("SELECT * FROM inscricao");
			$lista = array(); //crio chamando função array()

			/*for($i = 0; $i<$dados.lenght; $i++){
				$i->setinscricao($dados[i][1]);
			}*/
			
			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$i = new Inscricao();
				$i->setIdinscricao($linha["idinscricao"]);
				$i->setIdatividade($linha["idatividade"]);
        $i->setIdusuario($linha["idusuario"]);
				$i->setDatainscricao($linha["datainscricao"]);
				$lista[] = $i;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//listar User
	public function listarUser($idusuario){
		try {
			$dados = $this->con->query("SELECT * FROM inscricao WHERE idusuario='$idusuario'");
			$lista = array(); //crio chamando função array()

			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$i = new Inscricao();
				$i->setIdinscricao($linha["idinscricao"]);
				$i->setIdusuario($linha["idusuario"]);
				$i->setIdatividade($linha["idatividade"]);
				$i->setDatainscricao($linha["datainscricao"]);
				$lista[] = $i;
			}

			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//listar Ativ
	public function listarAtiv($idatividade){
		try {
			$dados = $this->con->query("SELECT * FROM inscricao WHERE idatividade='$idatividade'");
			$lista = array(); //crio chamando função array()

			foreach ($dados as $linha) {
				//percorre linha a linha de dados e coloca cada registro
				//na variável linha (que é um vetor)
				$i = new Inscricao();
				$i->setIdinscricao($linha["idinscricao"]);
				$i->setIdusuario($linha["idusuario"]);
				$i->setIdatividade($linha["idatividade"]);
				$i->setDatainscricao($linha["datainscricao"]);
				$lista[] = $i;
			}

			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idinscricao){
		try {
			$lista = $this->con->query("SELECT * FROM inscricao WHERE idinscricao='$idinscricao'");

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$i = new Inscricao();
			$i->setIdinscricao($dado[0]["idinscricao"]);
			$i->setIdatividade($dado[0]["idatividade"]);
			$i->setIdusuario($dado[0]["idusuario"]);
			$i->setDatainscricao($dado[0]["datainscricao"]);

			return $i;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
