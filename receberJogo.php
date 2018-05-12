<?php
include_once "dao/DaoUsuario.php";
include_once "dao/DaoJogo.php";
session_start();
$daousuario = new DaoUsuario();
$usuario = $daousuario->getUsuario($_SESSION['id']);
Usuario::checkPermissao(2);

$arquivo = $_FILES['arquivo'];

if (isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])) {
    if ($arquivo['type'] == "application/x-zip-compressed" || $arquivo['type'] == "application/zip") {

        $nomeDoArquivo = SHA1(time() . rand(0, 9999));

        $nomeDoJogo = addslashes($arquivo['name']);
        $nomeDoJogo = explode(".", $nomeDoJogo);
        $nomeDoJogo = $nomeDoJogo[0];

        move_uploaded_file($arquivo['tmp_name'], 'jogos/arquivos/' . $nomeDoArquivo . '.zip');

        $jogo = new Jogo();
        $jogo->setNome($nomeDoJogo);
        $jogo->setHashArquivo($nomeDoArquivo);
        $jogo->setDescricao("Pequena Descricao do Jogo!");
        $jogo->setIdUsuario($usuario->getId());

        $jogoDao = new DaoJogo();
        $jogoDao->salvar($jogo);

    } else {
        header("Location: enviarJogo.php");
        exit;
    }
}
?><!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Jogos Educacionais</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include_once('assets/layout/header.php') ?>

          <div class="starter-template">

                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sucesso!</Strong> Seu jogo foi enviado para análise! Caso esteja no padrão requerido, estará em nosso acervo em breve!
                </div>
                <br><br><br>

                <div role="main" class="container">
                <p>
                    <h4>Agradecemos pela sua contribuição!</h4>
                    </p>
                </div>
            </div>

            <br><br><br><br><br><br><br><br>
            
    <?php include_once('assets/layout/footer.html') ?>
</body>
    
</html>