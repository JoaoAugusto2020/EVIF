  <!--! CORPO -->
  <h1 id="titulo" class="text-center">EVENTOS E VIAGENS PUBLICADOS</h1>

  <!--? FILTRO -->
  <div class="espaco-sm"></div>
  <div id="filtro-container" class="centralizar-div">
      <div>
          <div class="filtro-box">
              <input type="text" id="titleFilter" placeholder="Digite o nome do evento">
              
              <!-- <button type="submit" id="pesquisar">Pesquisar <i class="fas fa-search"></i></button> -->
          </div>

          <div class="filtro-tipo">
            <input type="radio" id="todos" name="typeFilter" value="" checked> <label for="todos">Todos</label>
            <input type="radio" id="evento" name="typeFilter" value="evento"> <label for="evento">Evento</label>
            <input type="radio" id="viagem" name="typeFilter" value="viagem"> <label for="viagem">Viagem</label>
            <!-- <input type="checkbox" id="pesquisaRapida" name="pesquisaRapida" value="true" checked> <label for="viagem">Pesquisa Rápida</label> -->
          </div>
      </div>
  </div>

  <!--? CARDS ABERTOS -->
  <div class="espaco-md"></div>
  <!-- <h2 id="subtitulo" class="text-center">Inscrições Abertas</h2> -->

  <div class="container">
    <div class="row">

  <?php
  foreach ($lista as $a) {
  if($a->getTipo() === "Viagem"){ 

  ?>

    <!-- Card Viagem -->
      <div class="col-lg-6 card-item" data-title="<?php echo $a->getTitulo() ?>" data-type="<?php echo $a->getTipo() ?>">
        <div class="card">
          <!-- imagem -->
          <div class="card-img-div">
            <img src="visao/img/capas/viagem.png" alt="" class="card-img">
          </div>

          <!-- descrição -->
          <div class="card-body">
            <h5 class="card-title"><?php echo $a->getTipo() ?> | <?php echo $a->getTitulo() ?></h5>
            <p>
              Professor(a) responsável: <?php echo $a->getProfessor() ?> <br>
              Local de destino: <?php echo $a->getLocal() ?>
            </p>
            <p class="text-start">
              <?php 
                if($a->getDatainicio() == $a->getDatafim()) echo "Data: " .$a->getDatainicio(). "<br>";
                else echo "Data de início: " .$a->getDatainicio(). " a " .$a->getDatafim(). "<br>";
              ?>
            </p>
          </div>

          <!-- botões -->
          <div class="card-footer">
            <a class="btn btn-info" href="atividade.php?fun=exibir&id='<?php echo $a->getIdatividade(); ?>'">Mais informações</a>
            <a class="btn btn-inscricao" href="atividade.php?fun=inscrever&id='<?php echo $_SESSION['usuario'] ?>'">Inscrever-se</a>
          </div>
        </div>
      </div>
  <?php 
  } else {
  ?>

      <!-- Card Evento -->
      <div class="col-lg-6 card-item" data-title="<?php echo $a->getTitulo() ?>" data-type="<?php echo $a->getTipo() ?>">
        <div class="card">
          <!-- imagem -->
          <div class="card-img-div">
            <img src="visao/img/capas/evento.png" alt="capa" class="card-img">
          </div>

          <!-- descrição -->
          <div class="card-body">
            <h5 class="card-title text-truncate" style='max-width: 100%;'><?php echo $a->getTipo() ?> | <?php echo $a->getTitulo() ?></h5>
            <p>
              Professor(a) responsável: <?php echo $a->getProfessor() ?> <br>
              Local: <?php echo $a->getLocal() ?>
            </p>
            <div class="info-row">
              <p class="text-start">
                <?php 
                  if($a->getDatainicio() == $a->getDatafim()) echo "Data: " .$a->getDatainicio(). "<br>";
                  else echo "Data de início: " .$a->getDatainicio(). " a " .$a->getDatafim(). "<br>";
                ?>
              </p>
              <p class="text-end">
                Aberto a comunidade? <?php echo $a->getAberto() ?> <br>
              </p>
            </div>
          </div>

          <!-- botões -->
          <div class="card-footer">
            <a class="btn btn-info" href="atividade.php?fun=exibir&id='<?php echo $a->getIdatividade(); ?>'">Mais informações</a>
            <a class="btn btn-inscricao" href="atividade.php?fun=inscrever&id='<?php echo $_SESSION['usuario'] ?>'">Inscrever-se</a>
          </div>
        </div>
      </div>

  <?php } } ?>

    </div> 
  </div>
      
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