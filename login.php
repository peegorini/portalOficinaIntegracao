<?php
require ("dao/DaoUsuario.php");

$msgErro = '';

if($_POST){
    $usuario = new Usuario();
    $usuario->setRa($_POST['ra']);
    $usuario->setSenha($_POST['senha']);

    $loginUsuario = new DaoUsuario();

    if ($loginUsuario->loginUsuario($usuario)) {
        if($usuario->getNivelAcesso() == 1){
            header("Location: index.php");
            exit;
        }
        else if($usuario->getNivelAcesso() == 2){
            header("Location: pagina-do-professor.php");
            exit;
        }
        else if($usuario->getNivelAcesso() == 3){
            header("Location: publicar-jogo.php");
            exit;
        }

    } else {
        $msgErro = 'Dados inválidos, tente novamente.<br><br>Verifique seu e-mail para confirmar seu cadastro caso ainda não tenha feito.';
    }
}

# ATIVAÇÃO DA CONTA
if (!empty($_GET['token'])){

    $token = $_GET['token'];

    $dbcon = new ConnManager();
    $conn = $dbcon->connect();

    $sql = "SELECT * FROM usuarios_tokens WHERE hash = :hash AND usado = 0 AND expira_em > now()";
    $sql = $conn->prepare($sql);
    $sql->bindValue(":hash", $token);
    $sql->execute();

    if ($sql->rowCount() > 0){

        $sql = $sql->fetch();
        $id = $sql['id_usuario'];

        $sql = "UPDATE usuarios_tokens SET usado = 1 WHERE hash = :hash";
        $sql = $conn->prepare($sql);
        $sql->bindValue(":hash",$token);
        $sql->execute();
    }
}

?><!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Login - Jogos Educacionais</title>

    <link rel="stylesheet" href="assets/css/sigin.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body class="text-center">
    <form class="form-signin" method="POST">
        <img class="mb-4" src="assets/img/logo2.png" width="220px" height="85px">
        <h4>Jogos Educacionais</h4>
        <br>
        <label for="inputRA" class="sr-only">Email address</label>
        <input type="text" class="form-control" id="inputRA" name="ra" placeholder="RA" required autofocus>
        <br>
        <label for="inputSenha" class="sr-only">Password</label>
        <input type="password" id="inputSenha" name="senha" class="form-control" placeholder="Senha" required>
        <div class="opcoes">
            <a href="recuperar-senha.php">Esqueci a Senha</a>
            |
            <a href="criar-conta.php">Criar Conta</a>
        </div>
        <?php if(!empty($msgErro)){ ?>

            <p class="alert alert-danger"><?php echo $msgErro ?></p>

        <?php } ?>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Entrar</button>
    </form>
    
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>