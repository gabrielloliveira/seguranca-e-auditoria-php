<?php
  @session_start();

  if (isset($_SESSION['logado']) && $_SESSION['logado'] == '2etapas') {
    header('Location: 2etapas.php');
    exit(0);
  }else if(isset($_SESSION['logado']) && $_SESSION['logado'] == 'logado'){
    header('Location: perfil.php');
    exit(0);
  }else{
    if ($_POST) {
      $usuarioQueSeLogou = $_POST['usuario'];
      $senha = $_POST['senha'];

      require_once 'conexao.php';

      $resultado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario='$usuarioQueSeLogou'");

      if ($resultado) {
        $usuario = mysqli_fetch_assoc($resultado);

        if ($usuario && password_verify($senha, $usuario['senha'])) {

          $codigo = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), -4);

          $resultado = mysqli_query($conexao, "UPDATE usuarios SET codigo2etapas='$codigo' WHERE usuario='$usuarioQueSeLogou'");

          if ($resultado) {
            //Aqui vocë poderá enviar a mensagem com o código gerado para o elular do usuário. Existem vários serviçoes que 
            //fazem isso. Basta pesquisar no google

            $_SESSION['logado'] = '2etapas';
            $_SESSION['usuario'] = $usuario['usuario'];

            header('Location: 2etapas.php');
            exit(0);
          }
        }
      }
    }
  }


  require_once 'header.php';
?>
<h1>Login</h1>
<form action="" method="post">
  <p>
    <label for="usuario">Usuário: </label>
    <input type="text" name="usuario" id="usuario" required placeholder="Digite o nome de usuário">
  </p>
  <p>
    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha" required placeholder="Digite sua senha">
  </p>
  <p>
    <button type="submit">Entrar</button>
  </p>
</form>