  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Cadastrar Usuário</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="form" action="usuario.php?fun=update" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $u->getIdusuario(); ?>" >

      <input class="input" type="text" name="nome" id="nome" placeholder="Nome"  value="<?php echo $u->getNome(); ?>" required/> <br>
      <input class="input" type="email" name="email" id="email" placeholder="E-mail"  value="<?php echo $u->getEmail(); ?>" required/> <br>

      <div class="input-senha">
          <input type="password" name="senha" id="senha" placeholder="Senha" value="<?php echo $u->getSenha(); ?>" required/>
          <img src="visao/img/icones/olho-aberto.png" id="olho">
      </div>
      
      <select name="nivel" id="nivel" class="input  mb-3" required>
        <option value="0" <?php if($u->getNivel() == 0) echo "selected"; ?>>Comunidade externa</option>
        <option value="3" <?php if($u->getNivel() == 3) echo "selected"; ?>>Aluno</option>
        <option value="2" <?php if($u->getNivel() == 2) echo "selected"; ?>>Professor</option>
        <option value="1" <?php if($u->getNivel() == 1) echo "selected"; ?>>Administrador</option>
      </select>

      <div>
        <button class="btn btn-success" type="submit" name="enviar" value="enviar">Salvar</button>
        <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
        <a class="btn btn-secondary" href="usuario.php?fun=list">Voltar</a>
      </div>
    </form>  
  </div>