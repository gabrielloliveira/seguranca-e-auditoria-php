<?php
  @session_start();

  if (isset($_SESSION['logado']) && $_SESSION['logado'] == '2etapas') {

    require_once 'conexao.php';

    $usuario2etapas = $_SESSION['usuario'];
    $resultado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario='$usuario2etapas'");

    $usuario = mysqli_fetch_assoc($resultado);
    $celular = $usuario['celular'];

    if ($_POST) {

      $codigo_digitado = $_POST['codigo'];
      $codigo_gerado = $usuario['codigo2etapas'];

      if ($codigo_gerado == $codigo_digitado) {
        $_SESSION['logado'] = 'logado';
        header('Location: perfil.php');
        exit(0);
      }
    }
  } else if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'logado') {
    header('Location: perfil.php');
    exit(0);
  } else {
    header('Location: entrar.php');
    exit(0);
  }

?>

<form method="post">
  <label>Digite o Codigo enviado ao Celular: <?= $celular ?></label>
  <input type="text" name="codigo">

  <button type="submit">Enviar</button>

</form>