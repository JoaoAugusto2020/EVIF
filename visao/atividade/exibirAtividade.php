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

    <a class="btn btn-success" href="inscricao.php?fun=create&id=<?php echo $a->getIdatividade() ?>">Inscrever-se</a>
    <br><br>

    <p><?php echo $a->getDescricao(); ?></p>
  </div>