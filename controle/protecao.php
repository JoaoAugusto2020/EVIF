<?php
include_once("modelo/UsuarioDAO_class.php");

if(!function_exists("proteger")){
  function proteger(){
    if(!isset($_SESSION)) session_start();

    if(!isset($_SESSION["usuario"]) || !is_numeric($_SESSION["usuario"])){
      echo '<script>'; 
      echo 'alert("Autenticação necessária!");'; 
      echo 'window.location.href = "usuario.php?fun=signin";';
      echo '</script>';
    }
  }
}

if(!function_exists("protegerProf")){
  function protegerProf(){
    if(!isset($_SESSION)) session_start();

    if(!isset($_SESSION["usuario"]) || !is_numeric($_SESSION["usuario"])){
      echo '<script>'; 
      echo 'alert("Autenticação necessária!");'; 
      echo 'window.location.href = "usuario.php?fun=signin";';
      echo '</script>';
    } else {
      $u = new Usuario();
      $dao = new UsuarioDAO();
      $u = $dao->exibir($_SESSION["usuario"]);

      if(!($u->getNivel()==1 || $u->getNivel()==2)){
        echo '<script>'; 
        echo 'alert("Página restrita à professores! Se você for um professor, solicite o perfil de professor nas configurações.");'; 
        echo 'window.location.href = "usuario.php?fun=config";';
        echo '</script>';
      }
    }
  }
}

if(!function_exists("protegerAdmin")){
  function protegerAdmin(){
    if(!isset($_SESSION)) session_start();

    if(!isset($_SESSION["usuario"]) || !is_numeric($_SESSION["usuario"])){
      echo '<script>'; 
      echo 'alert("Autenticação necessária!");'; 
      echo 'window.location.href = "usuario.php?fun=signin";';
      echo '</script>';
    } else {
      $u = new Usuario();
      $dao = new UsuarioDAO();
      $u = $dao->exibir($_SESSION["usuario"]);

      $nivel = $u->getNivel();
      if($nivel!=1){
        echo '<script>'; 
        echo 'alert("Página restrita para o Administrador!");'; 
        echo "javascript:history.go(-1);";
        echo '</script>';
      }
    }
  }
}
?>