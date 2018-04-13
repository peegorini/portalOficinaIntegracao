<?php
include_once "dao/DaoUsuario.php";
include_once "dao/DaoJogo.php";
session_start();
$daousuario = new DaoUsuario();
$usuario = $daousuario->getUsuario($_SESSION['id']);
$usuario->checkPermissao(2);

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
?>

<hr/>

<h2>Seu jogo foi enviado com sucesso para análise!</h2><br/>
<h3>Caso esteja tudo ok, logo ele estará disponível em nosso acervo!</h3><br/>
<h4>Obrigado pela contribuição! :)</h4><br/><br/>

<a href="index.php">Voltar para a home</a>
