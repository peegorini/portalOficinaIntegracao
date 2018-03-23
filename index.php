<?php
include_once("model/usuario.php");

$user = new Usuario();
$user->setRa(123);
$user->setSenha("1234");
$user->setNivelAcesso(1);

Usuario::loginUsuario($user);

echo $user->getRa();
echo '<br>';
echo $user->getSenha();
