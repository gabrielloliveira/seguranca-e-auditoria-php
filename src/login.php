<?php
  @session_start();
  if ($_POST) {
    $nome = $_POST['usuario'];
    $senha = $_POST['senha'];

    require_once 'conexao.php';

    $query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario='$nome'");

    if ($query) {
        $usuario = mysqli_fetch_assoc($query);

        if ($usuario && password_verify($senha, $usuario['senha'])) {

            $codigo = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 4);

            $query = mysqli_query($conexao, "UPDATE usuarios SET codigo2etapas='$codigo' WHERE usuario=$nome");

            //Aqui vocë poderá enviar a mensagem com o código gerado para o elular do usuário. Existem vários serviçoes que 
            //fazem isso. Basta pesquisar no google

            $_SESSION['logado'] = '2etapas';
            $_SESSION['usuario'] = $usuario['usuario'];

            header('Location: 2etapas.php');
            exit(0);
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