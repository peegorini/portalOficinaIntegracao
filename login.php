<?php
require ("model/Usuario.php");

$msgErro = '';

if($_POST){
    $usuario = new Usuario();
    $usuario->setRa($_POST['ra']);
    $usuario->setSenha($_POST['senha']);

    if ($usuario->loginUsuario()) {
        header("Location: plataforma.php");
    } else {
        $msgErro = 'Dados inválidos, tente novamente.';
    }    
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Login - Jogos Educacionais</title>
    
    <link rel="stylesheet" href="assets/css/sigin.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body class="text-center">
    <form class="form-signin" method="post">
        <img class="mb-4" src="assets/img/utf-logo.png" width="200px" height="65px">
        <h4>Jogos Eduacionais</h4>
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="ra" class="form-control" id="inputText" placeholder="RA" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
        <div class="checkbox mb-3">
            <!-- <label>
                <input type="checkbox" value="remember-me"> Lembrar-se
            </label> -->

            <a href="login/esqueciasenha.php">Esqueci a Senha</a>
            |
            <a href="login/novaconta.php">Criar Conta</a>
            <?php if(!empty($msgErro)){ ?>

                <p class="alert-warning"><?php echo $msgErro ?></p>

            <?php } ?>
        </div>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Entrar</button>
    </form>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
