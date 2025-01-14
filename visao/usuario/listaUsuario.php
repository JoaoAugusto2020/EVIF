<h1 class="titulo">Usuários</h1>

<p class="centralizado"><a class="link-escuro" href="usuario.php?fun=signup">Cadastrar</a></p>
<div class="centralizar-div">
  <!-- <button id="tabelaOlho">
      <img src="visao/imagens/icones/olho-aberto.png" width="20px" height="20px">
  </button> -->
  <TABLE class="tabela">
    <TR>
      <TH> ID </TH>
      <TH> Nome completo</TH>
      <TH> E-mail </TH>
      <TH> CPF </TH>
      <TH> Senha </TH>
      <TH> Editar </TH>
      <TH> Excluir </TH>
    </TR>
    <!-- Primeira linha da tabela com o cabeçalho -->

    <?php
    foreach ($lista as $u) {
      echo "<TR>";

        echo "<TD>" .$u->getIdUsuario(). "</TD>";

        // <A href='usuario.php?fun=exibir&id="ID"'>
        echo "<TD><A class='link-escuro' href='usuario.php?fun=exibir&id=" .$u->getIdUsuario(). " '>" .$u->getNomeCompleto(). "</A></TD>";

        echo "<TD>" .$u->getEmail(). "</TD>";
        echo "<TD>" .$u->getCpf(). "</TD>";
        echo "<TD>" .$u->getSenha(). "</TD>";

        echo "<TD><A href=usuario.php?fun=alterar&id=" .$u->getIdusuario(). "><img src='visao/img/icones/update.png' width='30px'/> </A></TD>";

        echo "<TD><A href=usuario.php?fun=excluir&id=" .$u->getIdUsuario(). "><img src='visao/img/icones/delete.png' width='30px' /></A></TD>";

      echo "</TR>";
    }
    ?>
  </TABLE>
</div>

<br><br><br>
<A class="link-escuro" href="index.php?fun=adm"> Voltar </A>