drop database if exists sa;
create database sa;
use sa;

create table usuarios(
  id int not null auto_increment primary key,
  usuario varchar(50) unique not null,
  senha varchar(255) not null,
  email varchar(255) not null,
  celular varchar(15) not null,
  codigo2etapas varchar(4),
  admin bool default false
);