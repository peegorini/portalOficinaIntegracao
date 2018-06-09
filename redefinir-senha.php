<?php
require "dao/ConnManager.php";

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

        if(!empty($_POST["senha"])){
            $senha = sha1(addslashes($_POST['senha']));

            $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
            $sql = $conn->prepare($sql);
            $sql->bindValue(":senha",$senha);
            $sql->bindValue(":id",$id);
            $sql->execute();

            $sql = "UPDATE usuarios_tokens SET usado = 1 WHERE hash = :hash";
            $sql = $conn->prepare($sql);
            $sql->bindValue(":hash",$token);
            $sql->execute();

            echo "Senha alterada com sucesso!";
            exit;
        }
    } else {
        echo "Token inválido ou usado";
        exit;
    }
}

?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../imagens/favicon.ico">

    <title>Recuperar Senha - Jogos Educacionais</title>

    <link rel="stylesheet" href="assets/css/sigin.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="text-center">
    <form class="form-signin" method="POST">
        <img class="mb-4" src="assets/img/logo2.png" width="220px" height="85px">
        <h3>Jogos Educacionais</h3>
        <br>
        <h4>Redefinir Senha</h4>
        <br>
        <?php if(!empty($msg)){ ?>

            <p class="alert <?php echo ($msgStatus?'alert-success':'alert-danger')?>"><?php echo $msg ?></p>

        <?php } if(!$msgStatus){ ?>
        <label for="inputNovaSenha" class="sr-only">Nova Senha</label>
        <input type="text" class="form-control" id="inputNovaSenha" name="NovaSenha" placeholder="Digite sua nova senha" required autofocus>
        <br>
        <label for="inputRepetirNovaSenha" class="sr-only">Repetir Nova Senha</label>
        <input type="email" class="form-control" id="inputRepetirNovaSenha" name="RepetirNovaSenha" placeholder="Repita sua nova senha" required autofocus>
        <br>       
        <button class="btn btn-lg btn-dark btn-block" type="submit">Recuperar</button>
        <?php } ?>
    </form>

    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
