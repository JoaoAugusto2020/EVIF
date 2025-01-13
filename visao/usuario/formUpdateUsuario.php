  <!--! CORPO -->
  <h1 id="titulo" class="text-center">CONFIGURAÇÕES</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form action="usuario.php?update" method="POST" enctype="multipart/form-data">
      <div class="row">
        <h2>Meu perfil</h2>
        
        <div class="col">
          <h4>Dados pessoais</h4>
          <label for="nome">Nome</label> <br>
          <input type="text" name="nome" id="nome" value="<?php echo $u->getNome(); ?>" class="input campo"> <br>
          <label for="email">Email</label> <br>
          <input type="text" name="email" id="email" value="<?php echo $u->getEmail(); ?>" class="input campo"> <br>
          <br>
          
          <h6>Tipo de conta</h6>
          <input type="radio" name="nivel" value="comunidade" id="nivelComunidade" class="radiocurso campo"
          <?php if($u->getNivel()==0) echo "checked"; ?>>
          <label for="nivelComunidade">Comunidade externa</label>

          <input type="radio" name="nivel" value="aluno" id="nivelAluno" class="radiocurso campo" 
          <?php if($u->getNivel()==3) echo "checked"; ?>>
          <label for="nivelAluno">Aluno</label>

          <input type="radio" name="nivel" value="professor" id="nivelProfessor" class="radiocurso campo" 
          <?php if($u->getNivel()==2) echo "checked"; ?>>
          <label for="nivelProfessor">Professor</label> <br>
          <br>

          <div id="displaycurso">
            <h6>Curso matriculado</h6>
            <select name="curso" id="curso" class="input campo">
              <option value="">Selecione um curso</option>
              <?php
              // quantos cursos houver
              foreach ($listaC as $c) {
                echo "<option value=".$c->getIdcurso().">".$c->getNome()."</option>";
              }
              ?>
            </select> <br>
            <br>

            <h6>N° da matrícula presente na declaração</h6>
            <input type='text' name='matricula' id='matricula' placeholder='N° Matrícula' class='input campo' value="">
            <select name="delmatricula" id="delmatricula" class="input campo">
              <option value="">Selecione um matricula</option>
              <?php
              // quantos matriculas houver
              foreach ($listaM as $m) {
                echo "<option value=".$m->getMatricula().">".$m->getMatricula()."</option>";
              }
              ?>
            </select> <br>
            <a href="usuario.php?fun=delMatricula" class="link">Apagar</a>
            <br> <br>

            <h6>Período</h6>
            <input type='number' name='periodo' id='periodo' placeholder='Período/Ano' class='input campo' value="">

          </div>
        </div>

        <div class="col">
          <h4>Modo edição</h4>
          <input type="radio" name="edicao" value="habilitado" id="edicaoHabilitado" class="radioedicao"><label for="edicaoHabilitado">Habilitado</label>
          <input type="radio" name="edicao" value="desabilitado" id="edicaoDesabilitado" class="radioedicao" checked><label for="edicaoDesabilitado">Desabilitado</label> <br>
          <br>

          <h6>Alterar senha</h6>
          <label for="senhaAntiga">Senha antiga</label> <br>
          <input type="password" name="senhaAntiga" id="senhaAntiga" class="input campo"> <br>
          <label for="novaSenha">Nova senha</label> <br>
          <input type="password" name="novaSenha" id="novaSenha" class="input campo"> <br>
          <label for="confnovaSenha">Confirmar nova senha</label> <br>
          <input type="password" name="confnovaSenha" id="confnovaSenha" class="input campo"> <br>
        </div>
      </div>

      <div class="espaco-sm"></div>

      <div class="row">
        <h2>Notificações</h2> 
        <div class="col">
          <h6>Permitir notificações via navegador?</h6>
          <input type="radio" name="notificacao" value="habilitado" id="notificacaoHabilitado" class="radionotificacao campo"><label for="notificacaoHabilitado">Habilitado</label>
          <input type="radio" name="notificacao" value="desabilitado" id="notificacaoDesabilitado" class="radionotificacao campo" checked><label for="notificacaoDesabilitado">Desabilitado</label> <br>
        </div>
      </div>
      <br>

      <button class="btn btn-success" type="submit" name="enviar" value="enviar">Salvar Alterações</button>
      <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
    </form>
  </div>