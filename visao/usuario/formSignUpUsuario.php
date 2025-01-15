  <!--! CORPO -->
  <h1 id="titulo" class="text-center">Registrar-se</h1>
  <div class="espaco-sm"></div>

  <div class="container centralizar-div">
    <form class="" action="usuario.php?fun=signup" method="POST" enctype="multipart/form-data">

      <input class="input" type="text" name="nome" id="nome" placeholder="Nome" required/> <br>
      <input class="input" type="email" name="email" id="email" placeholder="E-mail" required/> <br>

      <div class="input-senha mb-3">
          <input type="password" name="senha" id="senha" placeholder="Senha" required/>
          <img src="visao/img/icones/olho-aberto.png" id="olho">
      </div>

      <button class="btn btn-success btn-full" type="submit" name="enviar" value="enviar">Cadastrar</button> <br><br>
      
      <p class="text-center">Já possui uma conta?<br>
      <a href="usuario.php?fun=signin" class="link">Entre aqui</a></p>
    </form>  
  </div>