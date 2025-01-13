<?php
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
?>