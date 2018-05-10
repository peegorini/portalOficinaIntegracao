<?php
require_once "dao/ConnManager.php";
date_default_timezone_set('America/Sao_Paulo');

$msg = '';
$msgStatus = false;

if(!empty($_POST['ra'])){

    $ra = addslashes($_POST['ra']);
    $email = $_POST['email'];

    $dbcon = new ConnManager();
    $conn = $dbcon->connect();

    $sql = "SELECT * FROM usuarios WHERE ra = :ra";
    $sql = $conn->prepare($sql);
    $sql->bindValue(":ra",$ra);
    $sql->execute();

    if($sql->rowCount() > 0){
        $sql = $sql->fetch();
        $id = $sql['id'];

        $token = sha1(time().rand(0,99999).rand(0,99999));

        $sql = "INSERT INTO usuarios_tokens SET id_usuario = :id_usuario, hash = :hash, expira_em = :expira_em";
        $sql = $conn->prepare($sql);
        $sql->bindValue(":id_usuario", $id);
        $sql->bindValue(":hash", $token);
        $sql->bindValue(":expira_em", date('Y-m-d H:i', strtotime('+1 months')));
        $sql->execute();


        $link = $_SERVER['SERVER_NAME'].'://'.$_SERVER['SERVER_NAME']."redefinir.php?token=".$token;
        // $link = "http://localhost/portaloficinaintegracao/redefinir.php?token=".$token;

        $mensagem = "Clique no link para redefinir sua senha:<br/>".$link;

        $assunto = "Redefinição de senha";

        $headers = 'From: teste@teste.com.br'."\r\n".'X-Mailer: PHP/'.phpversion();





        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From: $nome <$email>\r\n"; 
        $headers .= "Reply-To: $nome <$email>\r\n"; 
        $headers .= "Return-Path: $nome <$email>\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 

        $message = "<html><head></head><body>
                    Clique no link para redefinir sua senha:<br>
                    ".$_SERVER['SERVER_HOST'].'://'.$_SERVER['SERVER_NAME']."/redefinir.php?token=".$token."
                    <br><br>
                    </body></html>";
        $subject = "Redefinição de senha";

        $sentMail = @mail($sql['nome']." <".$email.">", $subject, $body, $headers);


        if($sentMail){
            $msg = 'Confira seu e-mail para mais instruções.';
            $msgStatus = true;
        }
        else{
            $msg = 'Não foi possível enviar, tente novamente.';
            $msgStatus = false;
        }
    }
    else{
        $msg = 'Não foi possível enviar, tente novamente.';
        $msgStatus = false;
    }
}
?><!doctype html>
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
        <h4>Recuperar Senha</h4>
        <br>
        <?php if(!empty($msg)){ ?>

            <p class="alert <?php echo ($msgStatus?'alert-success':'alert-danger')?>"><?php echo $msg ?></p>

        <?php } if(!$msgStatus){ ?>
        <label for="inputRA" class="sr-only">RA</label>
        <input type="text" class="form-control" id="inputRA" name="ra" placeholder="RA" required autofocus>
        <br>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="E-mail Institucional" required autofocus>
        <br>       
        <button class="btn btn-lg btn-dark btn-block" type="submit">Recuperar</button>
        <?php } ?>
    </form>

    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>