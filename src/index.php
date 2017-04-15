<?php
  require_once 'header.php';
  if (isset($_GET['mensagem'])){
    if ($_GET['mensagem']) {
      echo "<h5>Usuário cadastrado com sucesso! <a href='login.php'>Faça login</a></h5>";
    }else{
      echo "<h5>Erro ao cadastra o usuário!";
    }
  }
?>
<h1>Cadastro</h1>
<form action="cadastrar-usuario.php" method="post">
  <p>
    <label for="usuario">Nome de usuário: </label>
    <input type="text" placeholder="Digite seu nome de usuário" name="usuario" id="usuario" required>
  </p>
  <p>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" placeholder="exemplo@gmail.com" required>
  </p>
  <p>
    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha" required placeholder="Digite sua senha">
  </p>
  <p>
    <label for="tel">Celular: </label>
    <input type="text" name="tel" id="tel" value="+55" maxlength="14">
  </p>
  <p>
    <button type="submit">Cadastrar</button>
  </p>
</form>