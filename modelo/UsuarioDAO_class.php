<?php
include_once("ConnectionFactory_class.php"); //PDO
include_once("Usuario_class.php"); //entidade

class UsuarioDAO{
	//DAO - Data Access Object	
	//CRUD - Creat, Read, Update e Delete
	//operações básicas de banco de dados

	public $con = null; //obj recebe conexão

	public function __construct(){
		$conF = new ConnectionFactory();
		$this->con = $conF->getConnection();
	}

	//cadastrar
	public function cadastrar($usuario){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO usuario(nome, email, senha, nivel)
				VALUES (:nome, :email, :senha, :nivel)"
			);
			//:nome - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
      $stmt->bindValue(":nome", $usuario->getNome());
			$stmt->bindValue(":email", $usuario->getEmail());
			$stmt->bindValue(":senha", $usuario->getSenha());
			$stmt->bindValue(":nivel", $usuario->getNivel());

			$stmt->execute(); //execução do SQL	
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//alterar
	public function alterar($usuario){
		try {
			$stmt = $this->con->prepare(
				"UPDATE usuario SET 
				nome=:nome, 
				email=:email, 
				senha=:senha,
        nivel=:nivel WHERE
				idusuario=:idusuario"
			);

			//ligamos as âncoras aos valores de usuario
      $stmt->bindValue(":idusuario", $usuario->getIdusuario());
      $stmt->bindValue(":nome", $usuario->getNome());
			$stmt->bindValue(":email", $usuario->getEmail());
			$stmt->bindValue(":senha", $usuario->getSenha());
      $stmt->bindValue(":nivel", $usuario->getNivel());

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
	public function excluir($usuario){
		try {
			$num = $this->con->exec("DELETE FROM usuario WHERE idusuario = " . $usuario->getIdusuario());
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
				$dados = $this->con->query("SELECT * FROM usuario");
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
				$u = new Usuario();
				$u->setIdusuario($linha["idusuario"]);
        $u->setNome($linha["nome"]);
				$u->setEmail($linha["email"]);
				$u->setSenha($linha["senha"]);
				$u->setNivel($linha["nivel"]);
				$u->setDatacriacao($linha["datacriacao"]);
				$lista[] = $u;
			}
			return $lista;
			
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idusuario){
		try {
			$lista = $this->con->query("SELECT * FROM usuario WHERE idusuario = " . $idusuario);

			/*$this->con->close();
				$this->con = null;*/

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$u = new Usuario();
			$u->setIdusuario($dado[0]["idusuario"]);
			$u->setNome($dado[0]["nome"]);
			$u->setEmail($dado[0]["email"]);
			$u->setSenha($dado[0]["senha"]);
			$u->setNivel($dado[0]["nivel"]);
			$u->setDatacriacao($dado[0]["datacriacao"]);

			return $u;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
