  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Entrar</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="" action="usuario.php?fun=signin" method="POST" enctype="multipart/form-data">

      <input class="input" type="text" name="email" placeholder="E-mail" required> <br>

      <div class="input-senha mb-1">
          <input type="password" name="senha" id="senha" placeholder="Senha"/>
          <img src="visao/img/icones/olho-aberto.png" id="olho" alt="olho">
      </div>
      
      <a href="usuario.php?fun=resetSenha" class="link">Esqueci minha senha</a>
      <br><br>

      <button class="btn btn-success btn-full" type="submit" name="enviar" value="enviar">Entrar</button> <br><br>

      <p class="text-center">Não possui uma conta?<br>
      <a href="usuario.php?fun=signup" class="link">Cadastre-se aqui</a></p>
    </form>
  </div>
