  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Cadastrar Usuário</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="form" action="usuario.php?fun=create" method="POST" enctype="multipart/form-data">
      <label for="nome" class="form-label mb-0">Nome completo</label>
      <input class="form-control input" type="text" name="nome" id="nome" placeholder="Nome" required/>

      <label for="email" class="form-label mb-0">Email</label>
      <input class="form-control input" type="email" name="email" id="email" placeholder="E-mail" required/>

      <label for="senha" class="form-label mb-0">Senha</label>
      <div class="input-senha">
        <input type="password" name="senha" id="senha" placeholder="Senha" required/>
        <img src="visao/img/icones/olho-aberto.png" id="olho">
      </div>

      <div class="mb-3">
        <label for="nivel" class="form-label mb-0">Tipo de usuário</label>
        <select name="nivel" id="nivel" class="form-control input" required>
          <option value="0">Comunidade externa</option>
          <option value="3">Aluno</option>
          <option value="2">Professor</option>
          <option value="1">Administrador</option>
        </select>
      </div>

      <div>
        <button class="btn btn-success" type="submit" name="enviar" value="enviar">Cadastrar</button>
        <button class="btn btn-danger" type="reset" value="cancelar">Cancelar</button>
        <a class="btn btn-secondary" href="usuario.php?fun=list">Voltar</a>
      </div>
    </form>  
  </div>