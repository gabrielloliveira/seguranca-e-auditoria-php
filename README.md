# Segurança e auditoria de sistemas em PHP

Projeto para criptografia das senhas do usuário na base de dados usando MySQL, com login em duas etapas e restrição de páginas com base em usuários que sejam administradores.

##### Requerido:

- PHP-7.0 ou superior;
- MySQL 5.5 ou superior;

##### Passo a passo

- Primeiro faça um ```git clone  https://github.com/gabrielloliveira/seguranca-e-auditoria-php.git```;

- Depois, via terminal, entre na pasta *seguranca-e-auditoria-php/* e dentro dela entre na pasta *src/* (cd seguranca-e-auditoria-php/src/);

- Logo após entrar na pasta *src/* execute o script *banco.sql* (pode usar o Workbench ou phpMyAdmin);

- Depois de executar o script *banco.sql*, altere o arquivo *conexao.php* que está dentro da pasta src/ e coloque seu usuário e senha do seu MySQL;

- Feito tudo isso, agora execute a aplicação. Você pode executar com o comando *php -S localhost:8000* lembrando que para isso você tem que estar dentro da bpasta *src/*

Agora que você fez tudo, fique a vontade para brincar com o código, alterar, estudar o funcionamento, colocar CSS na aplicação, etc.
