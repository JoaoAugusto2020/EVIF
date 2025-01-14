  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Cadastrar Atividade</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="form" action="atividade.php?fun=create" method="POST" enctype="multipart/form-data">
      <div class="mb-2">
          <label class="form-label">Tipo de publicação</label>
          <div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input radiotipo" type="radio" name="tipo" id="evento" value="Evento" checked>
                  <label class="form-check-label" for="evento">Evento</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input radiotipo" type="radio" name="tipo" id="viagem" value="Viagem">
                  <label class="form-check-label" for="viagem">Viagem técnica</label>
              </div>
          </div>
      </div>
      <div id="displayevento">
        <div class="mb-2">
            <label for="title" class="form-label">Título</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Digite o título">
        
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" placeholder="Digite a descrição" rows="2"></textarea>
        
            <label for="local" class="form-label">Local do evento</label>
            <input type="text" class="form-control" name="local" id="local" placeholder="Campus, sala - bloco">
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="datainicio" class="form-label">Data de início</label>
                <input type="date" class="form-control" name="datainicio" id="datainicio" placeholder="00/00/0000">
            </div>
            <div class="col-md-6 mb-2">
                <label for="datafim" class="form-label">Data de encerramento</label>
                <input type="date" class="form-control" name="datafim" id="datafim" placeholder="00/00/0000">
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label">Público alvo</label>
            <div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input radiocurso" type="radio" name="aberto" id="nivelAluno" value="3" checked>
                  <label class="form-check-label" for="nivelAluno">Aluno</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input radiocurso" type="radio" name="aberto" id="nivelComunidade" value="0">
                  <label class="form-check-label" for="nivelComunidade">Comunidade externa</label>
              </div>
            </div>
        </div>
        <div class="mb-2" id="displaycurso">
          <label class="form-label">Cursos</label>
          <div>
            <?php 
            foreach ($listaC as $c){
              echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='checkbox' name='cursos[]' id='".$c->getIdcurso()."' value='".$c->getNome()."'>";
                echo "<label class='form-check-label' for='".$c->getIdcurso()."'>".$c->getNome()."</label>";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
      <div id="displayviagem">
        <div class="mb-2">
            <label for="title2" class="form-label">Título</label>
            <input type="text" class="form-control" name="title2" id="title2" placeholder="Digite o título">

            <label for="descricao2" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao2" id="descricao2" placeholder="Digite a descrição" rows="2"></textarea>
        
            <label for="local2" class="form-label">Local de destino</label>
            <input type="text" class="form-control" name="local2" id="local2" placeholder="Cidade">
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="datainicio2" class="form-label">Data de saída</label>
                <input type="date" class="form-control" name="datainicio2" id="datainicio2" placeholder="00/00/0000">
            </div>
            <div class="col-md-6 mb-2">
                <label for="datafim2" class="form-label">Data de chegada</label>
                <input type="date" class="form-control" name="datafim2" id="datafim2" placeholder="00/00/0000">
            </div>
        </div>
        <div class="mb-2">
          <label class="form-label">Cursos</label>
          <div>
            <?php 
            foreach ($listaC as $c){
              echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='checkbox' name='cursos[]' id='".$c->getIdcurso()."' value='".$c->getNome()."'>";
                echo "<label class='form-check-label' for='".$c->getIdcurso()."'>".$c->getNome()."</label>";
              echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
      
      <div class="text-center">
        <button class="btn btn-success" type="submit" name="enviar" value="enviar">Cadastrar</button>
        <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
      </div>

      
    </form>  
  </div>