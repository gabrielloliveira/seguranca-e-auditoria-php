<?php
  if ($_POST) {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $celular = $_POST['tel'];
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    require_once 'conexao.php';
    $codigoSql = "INSERT INTO usuarios (usuario, senha, email, celular) VALUES ('$usuario', '$senhaCriptografada', '$email', '$celular')";
    $resultado = mysqli_query($conexao, $codigoSql);

    if ($resultado){
      $mensagem = "1";
    }else{
      $mensagem = "0";
    }
    header("Location: index.php?mensagem=$mensagem");
    exit(0);
  }
  header("Location: index.php");
?>