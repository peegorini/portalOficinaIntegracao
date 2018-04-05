<?php
include_once "model/Jogo.php";
include_once "model/Usuario.php";
Usuario::checkPermissao(1);

$arquivo = $_FILES['arquivo'];

if (isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])) {
    if ($arquivo['type'] == "application/x-zip-compressed") {

        $nomeDoArquivo = SHA1(time() . rand(0, 9999));

        $nomeDoJogo = addslashes($arquivo['name']);
        $nomeDoJogo = explode(".", $nomeDoJogo);
        $nomeDoJogo = $nomeDoJogo[0];

        move_uploaded_file($arquivo['tmp_name'], 'jogos/arquivos/' . $nomeDoArquivo . '.zip');

        $jogo = new Jogo();
        $jogo->setNome($nomeDoJogo);
        $jogo->setHashArquivo($nomeDoArquivo);
        $jogo->setDescricao("Pequena Descricao do Jogo!");
        $jogo->setIdUsuario($_SESSION['id']);

        $jogo->salvar();
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

<a href="../plataforma.php">Voltar para a home</a>
