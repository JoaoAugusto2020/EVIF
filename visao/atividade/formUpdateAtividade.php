  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Editar Atividade</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="form" action="atividade.php?fun=update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $a->getIdatividade(); ?>" >

      <div class="mb-2">
          <label class="form-label">Tipo de publicação</label>
          <div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="evento" value="Evento"
                  <?php if($a->getTipo()=="Evento") echo "checked"; ?> required>
                  <label class="form-check-label" for="evento">Evento</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" id="viagem" value="Viagem"
                  <?php if($a->getTipo()=="Viagem") echo "checked"; ?> required>
                  <label class="form-check-label" for="viagem">Viagem técnica</label>
              </div>
          </div>
      </div>
      <div id="displayevento">
        <div class="mb-2">
            <label for="title" class="form-label">Título</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Digite o título" maxlength="100" value="<?php echo $a->getTitulo() ?>" required>
        
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" placeholder="Digite a descrição" rows="2" maxlength="5000" required><?php echo $a->getDescricao() ?></textarea>
        
            <label for="local" class="form-label">Local</label>
            <input type="text" class="form-control" name="local" id="local" placeholder="Cidade/Campus/Sala" maxlength="50" value="<?php echo $a->getLocal() ?>" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="datainicio" class="form-label">Data de início</label>
                <input type="date" class="form-control" name="datainicio" id="datainicio" placeholder="00/00/0000" value="<?php echo $a->getDatainicio() ?>" required>
            </div>
            <div class="col-md-6 mb-2">
                <label for="datafim" class="form-label">Data de encerramento</label>
                <input type="date" class="form-control" name="datafim" id="datafim" placeholder="00/00/0000" value="<?php echo $a->getDatafim() ?>" required>
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label">Público alvo</label>
            <div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input radiocurso" type="radio" name="aberto" id="nivelAluno" value="Não" 
                  <?php if($a->getAberto()=='Não') echo "checked"; ?> >
                  <label class="form-check-label" for="nivelAluno">Aluno</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input radiocurso" type="radio" name="aberto" id="nivelComunidade" value="Sim" 
                  <?php if($a->getAberto()=='Sim') echo "checked"; ?> >
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
      
      <div class="text-center">
        <button class="btn btn-success" type="submit" name="enviar" value="enviar">Salvar</button>
        <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
        <a class="btn btn-secondary" href="javascript:void(0)" onClick="history.go(-1); return false;">Voltar</a>
      </div>
    </form>  
  </div>