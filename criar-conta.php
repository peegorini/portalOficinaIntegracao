<?php
require "dao/DaoUsuario.php";

$msg = '';
$headerRedirect = '';
$msgStatus = false;

if (!empty($_POST['ra']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){

    $usuario = new Usuario();

    $usuario->setRa(addslashes($_POST['ra']));
    $usuario->setNome(addslashes($_POST['nome']));
    $usuario->setEmail(addslashes($_POST['email']));
    $usuario->setSenha($_POST['senha']); // Dado encriptografado com SHA-1

    $daoUsuario = new DaoUsuario();
    if($daoUsuario->salvar($usuario)){
        $msg = 'Cadastro efetuado com sucesso! Redirecionando para a página de login...';
        $msgStatus = true;
        $headerRedirect = '<meta http-equiv="refresh" content="5; url=login.php" />';
    }
    else{
        $msg = 'Não foi possível completar seu cadastro, verifique os dados.';
        $msgStatus = false;
    }
}


?><!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/img/favicon.ico">
    <?php echo $headerRedirect ?>
    <title>Criar Conta - Jogos Educacionais</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/sigin.css">

</head>

<body class="text-center">
    <form class="form-signin" method="POST">
        <img class="mb-4" src="assets/img/logo2.png"width="220px" height="85px">
        <h3>Jogos Educacionais</h3>
        <br>
        <h4>Criar conta</h4>
        <br>
        <?php if(!empty($msg)){ ?>

            <p class="alert <?php echo ($msgStatus?'alert-success':'alert-danger')?>"><?php echo $msg ?></p>

        <?php } if(!$msgStatus){ ?>
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
        <?php } ?>
    </form>

    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>