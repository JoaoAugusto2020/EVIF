  <h1 id="titulo">Solicitações</h1>

  <div class="espaco-sm"></div>

  <div class="centralizar-div">
    <table class="tabela">
      <tr>
        <th> ID </th>
        <th> Usuário </th>
        <th> Nível solicitado </th>
        <th> Situação </th>
        <th> Aceitar </th>
        <th> Negar </th>
        <th> Excluir </th>
      </tr>
      <!-- Primeira linha da tabela com o cabeçalho -->

      <?php
      foreach ($listaS as $s) {
        echo "<tr>";
          $dao = new UsuarioDAO();
          $u = new Usuario();
          $u = $dao->exibir($s->getIdusuario());

          if($s->getNivel()==1) $nivel = "Administrador";
          else if($s->getNivel()==2) $nivel = "Professor";
          else if($s->getNivel()==3) $nivel = "Aluno";
          else $nivel = "Comunidade";

          echo "<td>" .$s->getIdsolicitacao(). "</td>";
          echo "<td>" .$u->getNome(). "</td>";
          echo "<td>" .$nivel. "</td>";
          echo "<td>" .$s->getStatus(). "</td>";
          
          if($s->getStatus() == "Pendente") echo "<td><a href=solicitacao.php?fun=aceitar&id=" .$s->getIdsolicitacao(). ">Aceitar</a></td>";
          else echo "<td>Aceitar</td>";

          if($s->getStatus() == "Pendente") echo "<td><a href=solicitacao.php?fun=negar&id=" .$s->getIdsolicitacao(). ">Negar</a></td>";
          else echo "<td>Negar</td>";

          echo "<td><a href=solicitacao.php?fun=delete&id=" .$s->getIdsolicitacao(). "><img src='visao/img/icones/delete.png' width='30px' /></a></td>";

        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <p class="text-center"><a class="link" href="index.php?fun=adm">Voltar Adm</a></p>