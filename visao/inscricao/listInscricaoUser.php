<h1 id="titulo">Inscrições</h1>

<div class="espaco-sm"></div>

<div class="centralizar-div">
  <table class="tabela">
    <tr>
      <th> ID </th>
      <th> Usuário </th>
      <th> Atividade </th>
      <th> Data </th>
      <th> Excluir </th>
    </tr>
    <!-- Primeira linha da tabela com o cabeçalho -->

    <?php
    foreach ($listaI as $i) {
      echo "<tr>";
        $daoU = new UsuarioDAO();
        $u = new Usuario();
        $u = $daoU->exibir($i->getIdusuario());

        echo "<td>" .$i->getIdinscricao(). "</td>";
        echo "<td>" .$u->getNome(). "</td>";
        echo "<td>" .$i->getIdatividade(). "</td>";
        echo "<td>" .$i->getDatainscricao(). "</td>";

        echo "<td><a href=inscricao.php?fun=delete&id=" .$i->getIdinscricao(). "><img src='visao/img/icones/delete.png' width='30px' /></a></td>";

      echo "</tr>";
    }
    ?>
  </table>
</div>