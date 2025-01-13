<<<<<<< HEAD
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

	//create
	public function cadastrar($u){
		try {
			$stmt = $this->con->prepare(
				"INSERT INTO usuario(nome, email, senha, nivel)
				VALUES (:nome, :email, :senha, :nivel)"
			);
			//:nome - é uma âncora e será ligado pelo bindValue
			//SQL injection
			//ligamos as âncoras aos valores de veiculo
      $stmt->bindValue(":nome", $u->getNome());
			$stmt->bindValue(":email", $u->getEmail());
			$stmt->bindValue(":senha", $u->getSenha());
			$stmt->bindValue(":nivel", $u->getNivel());

			$stmt->execute(); //execução do SQL

			$nome = $u->getNome();
			echo "<script>alert('Usuário  '.mb_strtoupper($nome, 'UTF-8').' cadastrado com sucesso!');";
			
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//update
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

	//delete
	public function excluir($usuario){
		try {
			$num = $this->con->exec("DELETE FROM usuario WHERE idusuario = " . $usuario->getIdusuario());
			//numero de linhas afetadas pelo comando

			if ($num >= 1) {
				return 1;
			} else {
				return 0;
			}

			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//read
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
			
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//signin 
	public function signin($u){
		try {
			$email = $u->getEmail();
			$lista = $this->con->query("SELECT senha, idusuario FROM usuario WHERE email='$email'");

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);
			$erro = 0;

			if(count($dado) == 0){
				echo "<script>alert('Este email não pertence à nenhum usuário!');</script>";
				$erro++;
			}else{
				if($dado[0]["senha"] == $u->getSenha()){
					if(!isset($_SESSION)) session_start();
					$_SESSION["usuario"] = $dado[0]["idusuario"];
					echo "<script>alert('Usuário logado com sucesso!');</script>";
				}else{
					echo "<script>alert('Senha inválida!');</script>";
					$erro++;
				}
			}
			
			return $erro;

			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idusuario){
		try {
			$lista = $this->con->query("SELECT * FROM usuario WHERE idusuario = " .$idusuario);
			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$u = new Usuario();
			$u->setIdusuario($dado[0]["idusuario"]);
			$u->setNome($dado[0]["nome"]);
			$u->setEmail($dado[0]["email"]);
			$u->setSenha($dado[0]["senha"]);
			$u->setNivel($dado[0]["nivel"]);
			$u->setDatacriacao($dado[0]["datacriacao"]);

			return $u;

			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
=======
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

	//create
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

			$nome = $usuario->getNome();
			echo "<script>alert('Usuário  '.mb_strtoupper($nome, 'UTF-8').' cadastrado com sucesso!');";
			
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//update
	public function alterar($usuario){
		try {
			$stmt = $this->con->prepare(
				"UPDATE usuario SET 
				nome=:nome, 
				email=:email,
        nivel=:nivel WHERE
				idusuario=:idusuario"
			);

			//ligamos as âncoras aos valores de usuario
      $stmt->bindValue(":nome", $usuario->getNome());
			$stmt->bindValue(":email", $usuario->getEmail());
      $stmt->bindValue(":nivel", $usuario->getNivel());
			$stmt->bindValue(":idusuario", $usuario->getIdusuario());

			$this->con->beginTransaction();
			$stmt->execute(); //execução do SQL	
			$this->con->commit();

			echo "<script>alert('Usuário atualizado com sucesso!');</script>";
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	public function alterarSenha($usuario, $s, $ns, $cns){
		try {
			$lista = $this->con->query("SELECT senha FROM usuario WHERE idusuario = " . $usuario->getIdusuario());
			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);
			$senha = $dado[0]["senha"];

			if($s == $senha){
				if($ns == $cns){
					$senha = $ns;
					echo "<script>alert('Senha alterada com sucesso!');</script>";
				} else {
					echo "<script>alert('As senhas não são iguais!');</script>";
				}
			}else{
				echo "<script>alert('Senha anterior inválida!');</script>";
			}

			$stmt = $this->con->prepare(
				"UPDATE usuario SET 
				senha=:senha WHERE
				idusuario=:idusuario"
			);

			$stmt->bindValue(":senha", $senha);
			$stmt->bindValue(":idusuario", $usuario->getIdusuario());

			$this->con->beginTransaction();
			$stmt->execute(); //execução do SQL	
			$this->con->commit();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//delete
	public function excluir($usuario){
		try {
			$num = $this->con->exec("DELETE FROM usuario WHERE idusuario = " . $usuario->getIdusuario());
			//numero de linhas afetadas pelo comando

			if ($num >= 1) {
				return 1;
			} else {
				return 0;
			}

			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//read
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
			
			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//signin 
	public function signin($usuario){
		try {
			$email = $usuario->getEmail();
			$lista = $this->con->query("SELECT senha, idusuario FROM usuario WHERE email='$email'");

			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);
			$erro = 0;

			if(count($dado) == 0){
				echo "<script>alert('Este email não pertence à nenhum usuário!');</>";
				$erro++;
			}else{
				if($dado[0]["senha"] == $usuario->getSenha()){
					if(!isset($_SESSION)) session_start();
					$_SESSION["usuario"] = $dado[0]["idusuario"];
					echo "<script>alert('Usuário logado com sucesso!');</script>";
				}else{
					echo "<script>alert('Senha inválida!');</script>";
					$erro++;
				}
			}
			
			return $erro;

			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	//exibir 
	public function exibir($idusuario){
		try {
			$lista = $this->con->query("SELECT * FROM usuario WHERE idusuario = " .$idusuario);
			$dado = $lista->fetchAll(PDO::FETCH_ASSOC);

			$usuario = new Usuario();
			$usuario->setIdusuario($dado[0]["idusuario"]);
			$usuario->setNome($dado[0]["nome"]);
			$usuario->setEmail($dado[0]["email"]);
			$usuario->setSenha($dado[0]["senha"]);
			$usuario->setNivel($dado[0]["nivel"]);
			$usuario->setDatacriacao($dado[0]["datacriacao"]);

			return $usuario;

			/*$this->con->close();
				$this->con = null;*/
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
>>>>>>> master
