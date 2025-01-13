  <div class="container">
    <h1 class="titulo"> Você realmente deseja excluir a matrícula <?php echo $m->getMatricula(); ?>? </h1>

    <div class="centralizar-div">
      <a class="btn btn-success" href="usuario.php?fun=delete&conf=sim&idusuario=<?php echo $m->getIdusuario(); ?>"> SIM </a>
      <a class="btn btn-danger" href="usuario.php?fun=listar">NÃO</a>
    </div>
  </div>