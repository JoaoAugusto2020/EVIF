  <div class="container">
    <h1 id="titulo"> Você realmente deseja excluir o usuário <?php echo $u->getNome(); ?>? </h1>

    <div class="text-center">
      <a class="btn btn-success" href="usuario.php?fun=delete&conf=sim&id=<?php echo $u->getIdusuario(); ?>"> SIM </a>
      <a class="btn btn-danger" href="usuario.php?fun=list">NÃO</a>
    </div>
  </div>