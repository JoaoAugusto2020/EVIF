  <h1 id="titulo">Cursos</h1>

  <div class="espaco-sm"></div>

  <p class="text-center"><a class="link" href="curso.php?fun=create">Cadastrar</a></p>
  <div class="centralizar-div">
    <table class="tabela">
      <tr>
        <th> ID </th>
        <th> Nome </th>
        <th> Periodos </th>
        <th> Editar </th>
        <th> Excluir </th>
      </tr>
      <!-- Primeira linha da tabela com o cabeçalho -->

      <?php
      foreach ($lista as $c) {
        echo "<tr>";

          echo "<td>" .$c->getIdcurso(). "</td>";
          echo "<td>" .$c->getNome(). "</td>";
          echo "<td>" .$c->getPeriodos(). "</td>";

          echo "<td><a href=curso.php?fun=update&id=" .$c->getIdcurso(). "><img src='visao/img/icones/update.png' width='30px'/> </a></td>";
          echo "<td><a href=curso.php?fun=delete&id=" .$c->getIdcurso(). "><img src='visao/img/icones/delete.png' width='30px' /></a></td>";

        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <p class="text-center"><a class="link" href="index.php?fun=adm">Voltar Adm</a></p>