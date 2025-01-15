  <div class="container">
    <h1 id="titulo"><?php echo $a->getTitulo(); ?></h1>

    <div class="espaco-sm"></div>

    <h4 class="subtitulo"><?php echo $a->getTipo(); ?></h4>
    <p><strong>Professor(a) responsável:</strong> <?php echo $a->getProfessor(); ?></p>
    <p><strong>Aberto para a comunidade externa?</strong> <?php echo $a->getAberto(); ?></p>
    <br>

    <p><strong>Local:</strong> <?php echo $a->getLocal(); ?></p>
    <p><strong>Data:</strong> <?php
    if($a->getDatainicio() == $a->getDatafim()) echo $a->getDatainicio();
    else echo $a->getDatainicio(). " a " .$a->getDatafim();
    ?></p>
    <br>

    <p><?php echo $a->getDescricao(); ?></p>

    <a class="btn btn-inscricao" href="atividade.php?fun=inscrever&id='<?php echo $_SESSION['usuario'] ?>'">Inscrever-se</a>
  </div>