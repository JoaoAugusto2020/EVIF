  <!--! CORPO -->
  <h1 id="titulo" class="text-center">CONFIGURAÇÕES</h1>
  <div class="espaco-sm"></div>

  <div class="container">
    <div class="row centralizar-div-horizontal">
      <div class="col-3">
        <h4>Modo edição</h4>
        <div>
          <input type="radio" name="edicao" value="habilitado" id="edicaoHabilitado" class="radioedicao"><label for="edicaoHabilitado">Habilitado</label>
          &nbsp;
          <input type="radio" name="edicao" value="desabilitado" id="edicaoDesabilitado" class="radioedicao" checked><label for="edicaoDesabilitado">Desabilitado</label>
        </div>
      </div>
      <div class="col-3"></div>
    </div>

    <br>
    
    <div class="row centralizar-div-horizontal">
      <div class="col-3">
        <form class="form-config" action="usuario.php?fun=update" method="POST" enctype="multipart/form-data">
          <h2>Meu perfil</h2>
          <h4>Dados pessoais</h4>
          <label for="nome">Nome</label> 
          <input type="text" name="nome" id="nome" value="<?php echo $u->getNome(); ?>" class="input campo" required> 
          <label for="email">Email</label> 
          <input type="text" name="email" id="email" value="<?php echo $u->getEmail(); ?>" class="input campo" required> 

          <br>

          <div>
            <button class="btn btn-success" type="submit" name="enviar" value="enviar">Salvar Alterações</button>
            <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
          </div>
        </form>

        <br>

        <form class="form-config" action="matricula.php?fun=create" method="POST" enctype="multipart/form-data">
          <h4>Permissões</h4>  
          <h6>Tipo de conta</h6>
          <div>
            <input type="radio" name="nivel" value="0" id="nivelComunidade" class="radiocurso campo"
            <?php if($u->getNivel()==0) echo "checked"; ?>>
            <label for="nivelComunidade">Comunidade externa</label>

            <br>

            <input type="radio" name="nivel" value="3" id="nivelAluno" class="radiocurso campo" 
            <?php if($u->getNivel()==3) echo "checked"; ?>>
            <label for="nivelAluno">Aluno</label>

            <br>

            <input type="radio" name="nivel" value="2" id="nivelProfessor" class="radiocurso campo" 
            <?php if($u->getNivel()==2) echo "checked"; ?>>
            <label for="nivelProfessor">Professor</label> 
          </div>
          
          <br>
          <div id="displaycurso">
            <h6>Cursos disponíveis</h6>
            <select name="curso" id="curso" class="input campo">
              <option selected value="-1">Selecione o seu curso</option>
              <?php
              foreach ($listaC as $c) {
                echo "<option value=".$c->getIdcurso().">".$c->getNome()."</option>";
              }
              ?>
            </select> 
            
            <br><br>

            <h6>Matrícula emitida pelo CRCA</h6>
            <input type='text' name='matricula' id='matricula' placeholder='N° Matrícula' class='input campo' value="">
          </div>

          <div>
            <button class="btn btn-success campo" type="submit" name="enviar" value="enviar">Salvar</button>
          </div>
        </form>

        <br>

        <form class="form-config" id="displayMatricula" action="matricula.php?fun=delete" method="POST" enctype="multipart/form-data">
          <div>
            <h6>Matrículas ativas</h6>
            <select name="delmatricula" id="delmatricula" class="input campo mb-2" required>
              <?php
              if(count($listaM) > 0){
                foreach ($listaM as $m) {
                  echo "<option value=".$m->getMatricula().">".$m->getMatricula()."</option>";
                }
              }else{
                echo "<option selected value=''>Você não possui matrículas</option>";
              }

              ?>
            </select> 

            <br>

            <button class="btn btn-danger campo" type="submit" name="enviar" value="enviar">Apagar</button>
          </div> 
        </form>
          
      </div>

      <div class="col-3">
        <form class="form-config" action="usuario.php?fun=updateSenha" method="POST" enctype="multipart/form-data">
          <h2>Autenticação</h2>   
          <h6>Alterar senha</h6>
          <label for="senhaAntiga">Senha antiga</label> 
          <input type="password" name="senhaAntiga" id="senhaAntiga" class="input" required> 
          <label for="novaSenha">Nova senha</label> 
          <input type="password" name="novaSenha" id="novaSenha" class="input" required> 
          <label for="confnovaSenha">Confirmar nova senha</label> 
          <input type="password" name="confnovaSenha" id="confnovaSenha" class="input" required>

          <br>

          <div>
            <button class="btn btn-success" type="submit" name="enviar" value="enviar">Alterar senha</button>
            <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>