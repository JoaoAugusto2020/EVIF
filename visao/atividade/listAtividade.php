  <h1 id="titulo">Atividades</h1>

  <div class="espaco-sm"></div>

  <p class="text-center"><a class="link" href="atividade.php?fun=create">Cadastrar</a></p>
  <div class="centralizar-div">
    <table class="tabela">
      <tr>
        <th> ID </th>
        <th> Tipo </th>
        <th> Titulo </th>
        <th> Professor </th>
        <th> Descricao </th>
        <th> Local </th>
        <th> Data de início </th>
        <th> Data de encerramento </th>
        <th> Aberto? </th>
        <th> Inscrições </th>
        <th> Editar </th>
        <th> Excluir </th>
      </tr>
      <!-- Primeira linha da tabela com o cabeçalho -->

      <?php
      foreach ($lista as $a) {
        echo "<tr>";

          echo "<td>" .$a->getIdatividade(). "</td>";
          echo "<td>" .$a->getTipo(). "</td>";
          echo "<td class='text-truncate' style='max-width: 100px;'>" .$a->getTitulo(). "</td>";
          echo "<td>" .$a->getProfessor(). "</td>";
          echo "<td class='text-truncate' style='max-width: 100px;'>" .$a->getDescricao(). "</td>";
          echo "<td class='text-truncate' style='max-width: 100px;'>" .$a->getLocal(). "</td>";
          echo "<td>" .$a->getDatainicio(). "</td>";
          echo "<td>" .$a->getDatafim(). "</td>";
          echo "<td>" .$a->getAberto(). "</td>";

          echo "<td><a href=inscricao.php?fun=listProf&id=" .$a->getIdatividade(). ">Inscrições</a></td>";

          echo "<td><a href=atividade.php?fun=update&id=" .$a->getIdatividade(). "><img src='visao/img/icones/update.png' width='30px'/> </a></td>";
          echo "<td><a href=atividade.php?fun=delete&id=" .$a->getIdatividade(). "><img src='visao/img/icones/delete.png' width='30px' /></a></td>";

        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <p class='text-center'><a class='link' href='index.php?fun=adm'>Voltar Adm</a></p>