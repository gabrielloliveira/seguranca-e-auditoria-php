<?php
  @session_start();
?>
<header>
  <ul>
    <li><a href="index.php">Cadastre-se</a></li>
    <li><a href="perfil.php">Perfil</a></li>
    <?php  
    if (isset($_SESSION) && $_SESSION['logado']=='logado') {
      $usuarioLogado = $_SESSION['usuario'];
      require_once 'conexao.php';
      $resultado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario='$usuarioLogado'");
      $pessoaEncontrada = mysqli_fetch_assoc($resultado);
      if ($pessoaEncontrada['admin']==true) {
      ?>
        <li><a href="admin.php">Admin</a></li>
      <?php
      }
    ?>
    <li>
      <form action="sair.php" method="post">
        <input type="hidden" name="sair">
        <button type="submit">Sair</button>
      </form>
    <?php
    }else{
    ?>
    <li><a href="login.php">Login</a></li>
    <?php
    }
    ?>
  </ul>
</header>