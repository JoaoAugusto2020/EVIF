  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Recuperar Senha</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="" action="usuario.php?fun=resetSenha" method="POST" enctype="multipart/form-data">

    <input class="input" type="text" name="email" placeholder="E-mail" required> <br>
    <input class="input" type="text" name="recover_code" placeholder="Código de recuperação" required> <br>

      <div class="input-senha mb-1">
          <input type="password" name="novasenha" id="senha" placeholder="Nova senha" required>
          <img src="visao/img/icones/olho-aberto.png" id="olho" alt="olho">
      </div>

      <button class="btn btn-success btn-full" type="submit" name="enviar" value="enviar">Pronto</button> <br><br>
    </form>
  </div>
