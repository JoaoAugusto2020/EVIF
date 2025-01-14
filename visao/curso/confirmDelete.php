  <div class="container">
    <h1 id="titulo"> Você realmente deseja excluir o curso <?php echo $c->getNome(); ?>? </h1>

    <div class="text-center">
      <a class="btn btn-success" href="curso.php?fun=delete&conf=sim&id=<?php echo $c->getIdcurso(); ?>"> SIM </a>
      <a class="btn btn-danger" href="curso.php?fun=list">NÃO</a>
    </div>
  </div>