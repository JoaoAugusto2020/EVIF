  <div class="container">
    <h1 id="titulo"> Você realmente deseja excluir a atividade <?php echo $a->getTitulo(); ?>? </h1>

    <div class="text-center">
      <a class="btn btn-success" href="atividade.php?fun=delete&conf=sim&id=<?php echo $a->getIdatividade(); ?>"> SIM </a>
      <a class="btn btn-danger" href="javascript:void(0)" onClick="history.go(-1); return false;">NÃO</a>
    </div>
  </div>