<?php
include_once "dao/DaoUsuario.php";
$daousuario = new DaoUsuario();
$usuario = $daousuario->getUsuario($_SESSION['id']);
Usuario::checkPermissao(2);
?>

<h1>Enviar Jogo</h1>
<p>Seleciona o arquivo com as pastas de seu jogo abaixo.</p>
<p>Obs: o arquivo precisa estar obrigatóriamente zipado (.zip).</p>

<br/>

<form method="POST" enctype="multipart/form-data" action="receberJogo.php">
    <input type="file" name="arquivo" required> <br/><br/>
    <input type="submit" value="Enviar"/>
</form>
