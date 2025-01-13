  <div class="container">
    <h1 class="titulo"> Você realmente deseja excluir o usuário <?php echo $u->getNome(); ?>? </h1>

    <div class="centralizar-div">
      <a class="btn btn-success" href="usuario.php?fun=delete&conf=sim&matricula=<?php echo $u->getMatricula(); ?>"> SIM </a>
      <a class="btn btn-danger" href="usuario.php?fun=listar">NÃO</a>
    </div>
  </div>