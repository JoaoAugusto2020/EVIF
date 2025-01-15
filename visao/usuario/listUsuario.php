<h1 id="titulo">Usuários</h1>

<div class="espaco-sm"></div>

<p class="text-center"><a class="link" href="usuario.php?fun=create">Cadastrar</a></p>
<div class="centralizar-div">
  <table class="tabela">
    <tr>
      <th> ID </th>
      <th> Nome </th>
      <th> Email </th>
      <th> Senha </th>
      <th> Nível </th>
      <th> Data de Criação </th>
      <th> Editar </th>
      <th> Excluir </th>
    </tr>
    <!-- Primeira linha da tabela com o cabeçalho -->

    <?php
    foreach ($lista as $u) {
      echo "<tr>";

        echo "<td>" .$u->getIdusuario(). "</td>";
        echo "<td>" .$u->getNome(). "</td>";
        echo "<td>" .$u->getEmail(). "</td>";
        echo "<td>" .$u->getSenha(). "</td>";
        echo "<td>" .$u->getNivel(). "</td>";
        echo "<td>" .$u->getDatacriacao(). "</td>";

        echo "<td><a href=usuario.php?fun=update&id=" .$u->getIdusuario(). "><img src='visao/img/icones/update.png' width='30px'/> </a></td>";
        echo "<td><a href=usuario.php?fun=delete&id=" .$u->getIdusuario(). "><img src='visao/img/icones/delete.png' width='30px' /></a></td>";

      echo "</tr>";
    }
    ?>
  </table>
</div>