<?php 
  @session_start();

  if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'logado') {
    $usuario = $_SESSION['usuario'];
    require_once 'conexao.php';
    $resultado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario='$usuario'");


    if ($resultado) {
      $usuario_logado = mysqli_fetch_assoc($resultado);

      if ($usuario_logado && $usuario_logado['admin'] == false) {
        header('Location: perfil.php');
        exit(0);
      }

      $resultadoTodos = mysqli_query($conexao, "SELECT * FROM usuarios");

    }

  } else {
    header('Location: entrar.php');
    exit(0);
  }

  require_once 'header.php';

?>

<h1>Usuários</h1>

<table>
  <tr>
    <th>Id:</th>
    <th>Usuario:</th>
    <th>E-mail:</th>
    <th>Celular:</th>
    <th>Admin:</th>
    <th>Operações:</th>
  </tr>

  <?php while($u = mysqli_fetch_assoc($resultadoTodos)){ ?>

    <tr>
      <td><?= $u['id'] ?></td>
      <td><?= $u['usuario'] ?></td>
      <td><?= $u['email'] ?></td>
      <td><?= $u['celular'] ?></td>
      <td><?= $u['admin']? 'Sim' : 'Não' ?></td>
      <td>
        <form action="apagar.php" method="post">
          <input type="hidden" name="id" value="<?= $u['id'] ?>">
          <input type="hidden" name="usuario" value="<?= $u['usuario'] ?>">
          <button type="submit">Apagar</button>
        </form>
      </td>

    </tr>

  <?php 
  }
  ?>

</table>