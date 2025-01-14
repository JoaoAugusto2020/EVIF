  <?php
  include_once("controle/atividade/ListAtividade_class.php");
  $pag = new ListAtividade();

  foreach ($lista as $a) {
  if($a->getTipo() == "Viagem"){ 
  ?>

    <!-- Card Viagem -->
    <div class="col-lg-6 card-item" data-title="Viagem 1" data-type="viagem">
      <div class="card">
        <!-- imagem -->
        <div class="card-img-div">
          <img src="visao/img/capas/biofydia.png" alt="" class="card-img">
        </div>

        <!-- descrição -->
        <div class="card-body">
          <h5 class="card-title"><?php echo $a->getTipo() ?> | <?php echo $a->getTitulo() ?></h5>
          <div class="info-row">
            <div>
              <p>
                Professor organizador: <?php echo $a->getProfessor() ?><br>
                Data Saída: <?php echo $a->getDatainicio() ?><br>
                Data Chegada: <?php echo $a->getDatafim() ?><br>
                Local de Destino: <?php echo $a->getLocal() ?>
              </p>
            </div>
          </div>
        </div>

        <!-- botões -->
        <div class="card-footer">
          <button class="btn btn-info">Mais informações</button>
          <button class="btn btn-inscricao">Inscrever-se</button>
        </div>
      </div>
    </div>
  <?php 
  } else {
  ?>

    <!-- Card Evento -->
    <div class="col-lg-6 card-item" data-title="Evento 1" data-type="evento">
      <div class="card">
        <!-- imagem -->
        <div class="card-img-div">
          <img src="visao/img/capas/pizza.png" alt="capa" class="card-img">
        </div>

        <!-- descrição -->
        <div class="card-body">
          <h5 class="card-title">Evento | Título</h5>
          <div class="info-row">
            <div>
              <p>
                Professor organizador: <br>
                Data: <br>
                Aberto a comunidade?
              </p>
            </div>
            <div>
              <p class="text-end">
                Início: 00:00 <br>
                Encerramento: 00:00
              </p>
            </div>
          </div>
        </div>

        <!-- botões -->
        <div class="card-footer">
          <button class="btn btn-info">Mais informações</button>
          <button class="btn btn-inscricao">Inscrever-se</button>
        </div>
      </div>
    </div>

  <?php } } ?>
      
      <!-- 
      
        echo "<tr>";

          echo "<td>" .$a->getIdatividade(). "</td>";
          echo "<td>" .$a->getTipo(). "</td>";
          echo "<td>" .$a->getTitulo(). "</td>";
          echo "<td>" .$a->getProfessor(). "</td>";
          echo "<td>" .$a->getDescricao(). "</td>";
          echo "<td>" .$a->getLocal(). "</td>";
          echo "<td>" .$a->getDatainicio(). "</td>";
          echo "<td>" .$a->getDatafim(). "</td>";
          echo "<td>" .$a->getAberto(). "</td>";

          echo "<td><a href=atividade.php?fun=update&id=" .$a->getIdatividade(). "><img src='visao/img/icones/update.png' width='30px'/> </a></td>";
          echo "<td><a href=atividade.php?fun=delete&id=" .$a->getIdatividade(). "><img src='visao/img/icones/delete.png' width='30px' /></a></td>";

        echo "</tr>";
      
       -->