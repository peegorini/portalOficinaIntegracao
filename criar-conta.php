<?php
require "dao/DaoUsuario.php";

if (isset($_POST['ra']) && !empty($_POST['ra'])){
    if (isset($_POST['nome']) && !empty($_POST['nome'])){
        if (isset($_POST['email']) && !empty($_POST['email'])){
            if (isset($_POST['senha']) && !empty($_POST['senha'])){

                $usuario = new Usuario();

                $usuario->setRa(addslashes($_POST['ra']));
                $usuario->setNome(addslashes($_POST['nome']));
                $usuario->setEmail(addslashes($_POST['email']));
                $usuario->setSenha(sha1(addslashes($_POST['senha']))); // Dado encriptografado com SHA-1

                $daoUsuario = new DaoUsuario();
                $daoUsuario->salvar($usuario);
            }
        }
    }
}


?><!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/img/favicon.ico">

    <title>Criar Conta - Jogos Educacionais</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/sigin.css">

</head>

<body class="text-center">
    <form class="form-signin" method="POST">
        <img class="mb-4" src="assets/img/utf-logo.png" width="200px" height="65px">
        <h3>Jogos Educacionais</h3>
        <br>
        <h4>Criar conta</h4>
        <br>
        <label for="inputRA" class="sr-only">RA</label>
        <input type="text" class="form-control" id="inputRA" placeholder="RA" name="ra" required autofocus>
        <br>
        <label for="inputNome" class="sr-only">Nome</label>
        <input type="text" class="form-control" id="inputNome" placeholder="Nome Completo" name="nome" required autofocus>
        <br>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="E-mail Institucional" name="email" required autofocus>
        <br>
        <label for="inputSenha" class="sr-only">Password</label>
        <input type="password" id="inputSenha" class="form-control" placeholder="Senha" name="senha" required>
        <br>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Criar Conta</button>
    </form>

    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>