  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Editar Curso</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="form" action="curso.php?fun=update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $c->getIdcurso(); ?>" >

      <div class="mb-3">
        <label for="nome" class="form-label mb-0">Nome do curso</label>
        <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome do curso" value="<?php echo $c->getNome(); ?>" required>
      </div>
      <div class="mb-3">
        <label for="periodos" class="form-label mb-0">Períodos/Anos</label>
        <input class="form-control" type="number" name="periodos" id="periodos" placeholder="Quantidade de semestres/anos" value="<?php echo $c->getPeriodos(); ?>" required>
      </div>

      <div class="text-center">
        <button class="btn btn-success" type="submit" name="enviar" value="enviar">Salvar</button>
        <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
        <a class="btn btn-secondary" href="curso.php?fun=list">Voltar</a>
      </div>
    </form>  
  </div>