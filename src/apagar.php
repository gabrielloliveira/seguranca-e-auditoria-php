<?php 

  if ($_POST) {

    @session_start();

    $usuarioLogado = $_SESSION['usuario'];

    require_once 'conexao.php';

    $resultado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE admin=1 AND usuario='$usuarioLogado'");

    $quantidade_usuario = mysqli_num_rows($resultado);

    if ($resultado && $quantidade_usuario > 0) {

      $id = $_POST['id'];
      $usuario_a_ser_apagado = $_POST['usuario'];

      $resultado = mysqli_query($conexao, "DELETE FROM usuarios WHERE id=$id");

      if ($resultado) {
        if ($usuarioLogado == $usuario_a_ser_apagado) {
          session_destroy();
          header('Location: login.php');
          exit(0);
        }
        header('Location: admin.php');
        exit(0);
      }
    }
  }

  header('Location: perfil.php');
  exit(0);

?>