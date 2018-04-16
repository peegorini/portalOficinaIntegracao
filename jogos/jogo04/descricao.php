<?php
session_start();
require_once 'qrcode.php';

if(!isset($_COOKIE['qrcode']) || empty($_COOKIE['qrcode'])){
    header("Location: jogo04.php");
    exit;
}

$hash = addslashes($_COOKIE['qrcode']);

$qrcode = new QRCode();
if ($qrcode->buscaQRCode($hash) == false){
    header("Location: erro.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <img src="assets/images/<?php echo $qrcode->getHash()?>">
    <h1><?php echo $qrcode->getNome() ?> </h1>
    <h3>Descrição</h3>
    <p><?php echo $qrcode->getDescricao() ?></p>
</body>
</html>
