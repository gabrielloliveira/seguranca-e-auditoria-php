<?php
  @session_start();
  if ($_POST) {
    session_destroy();
    header('Location: entrar.php');
    exit(0);
  }
  header('Location: perfil.php');
  exit(0);
?>