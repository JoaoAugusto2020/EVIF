<?php
include_once("modelo/UsuarioDAO_class.php");

class DeleteUsuario{

	public function __construct(){
    if (isset($_GET["conf"])){
			if ($_GET["conf"] == "sim"){
				//enviar é o botão de submit
        
        $u = new Usuario();
				$u->setIdUsuario($_GET["id"]);

        $dao = new UsuarioDAO();
				$dao->excluir($u);

        echo "<script>window.location.href='usuario.php?fun=list';</script>";
			}
		} else {
			//encaminhar para a página de confirmação de exclusão

			$u = new Usuario();
			$dao = new UsuarioDAO();
			$u = $dao->exibir($_GET["id"]);

			include_once("visao/usuario/confirmDelete.php");
		}
  }
}
