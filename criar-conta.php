<?php
require "dao/DaoUsuario.php";

$msg = '';
$headerRedirect = '';
$msgStatus = false;

if (!empty($_POST['ra']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){

    ## VALIDAÇÃO
    $email = explode('@',$_POST['email']);
    $emailValido = false;

    if($email[1] == 'alunos.utfpr.edu.br'){
        # aluno
        $emailValido = true;
        $nivelAcesso = 1;
    }
    else if($email[1] == 'utfpr.edu.br'){
        # professor
        $emailValido = true;
        $nivelAcesso = 2;
    }
    else{
        $msg = 'Você precisa informar um email institucional da UTFPR.';
        $msgStatus = false;
    }

    if($emailValido){

        $usuario = new Usuario();

        $usuario->setRa(addslashes($_POST['ra']));
        $usuario->setNome(addslashes($_POST['nome']));
        $usuario->setEmail(addslashes($_POST['email']));
        $usuario->setSenha($_POST['senha']);
        $usuario->setNivelAcesso($nivelAcesso);

        $daoUsuario = new DaoUsuario();
        if($daoUsuario->salvar($usuario)){

            $token = sha1(time().rand(0,99999).rand(0,99999));

            $dbcon = new ConnManager();
            $conn = $dbcon->connect();

            $sql = "INSERT INTO usuarios_tokens SET id_usuario = :id_usuario, hash = :hash, expira_em = :expira_em";
            $sql = $conn->prepare($sql);
            $sql->bindValue(":id_usuario", $usuario->getId());
            $sql->bindValue(":hash", $token);
            $sql->bindValue(":expira_em", date('Y-m-d H:i', strtotime('+1 months')));
            $sql->execute();

            //header
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "From: $nome <$email>\r\n"; 
            $headers .= "Reply-To: $nome <$email>\r\n"; 
            $headers .= "Return-Path: $nome <$email>\r\n";
            $headers .= "X-Priority: 3\r\n";
            $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n\r\n"; 

            $link = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']."/login.php?token=".$token;
            
            $message = "<html><head></head><body>
                        Clique no link abaixo para confirmar seu cadastro:<br>
                        <a href='".$link."'>".$link."</a>
                        <br><br>
                        <strong>Confira o arquivo em anexo</strong></body></html>";
            $subject = "Confirmação de cadastro";

            
            $sentMail = @mail($nome." <".$email.">", $subject, $message, $headers);

            $msg = 'Cadastro efetuado com sucesso! Verifique seu e-mail para confirmar seu cadastro (cheque a caixa de SPAM)<br><br>';
            $msgStatus = true;
            // $headerRedirect = '<meta http-equiv="refresh" content="5; url=login.php" />';
        }
        else{
            $msg = 'Não foi possível completar seu cadastro, verifique os dados.';
            $msgStatus = false;
        }
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
            <?php if($msgStatus){ ?>
            <a class="btn btn-lg btn-dark" href="login.php">Login</a>
            <?php } ?>

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