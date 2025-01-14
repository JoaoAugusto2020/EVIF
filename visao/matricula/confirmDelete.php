  <div class="container">
    <h1 id="titulo"> Você realmente deseja excluir a matrícula <?php echo $m->getMatricula(); ?>? </h1>

    <div class="text-center">
      <a class="btn btn-success" href="matricula.php?fun=delete&conf=sim&matricula=<?php echo $m->getMatricula(); ?>"> SIM </a>
      <a class="btn btn-danger" href="matricula.php?fun=listar">NÃO</a>
    </div>
  </div>