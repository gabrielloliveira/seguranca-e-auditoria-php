<?php
  @session_start();

  if (isset($_SESSION['logado']) && $_SESSION['logado'] == '2etapas') {
    header('Location: 2etapas.php');
    exit(0);
  }else if(!isset($_SESSION['logado'])){
    header('Location: login.php');
    exit(0);
  }
  require_once 'header.php';
?>
<h1>Perfil</h1>
<h4>Olá <?=$_SESSION['usuario']?></h4>