<?php
// include_once "dao/connectionManager.php";
include_once "model/Usuario.php";
Usuario::checkPermissao(1);

$usuario = new Usuario($_SESSION['id']);

?>

<h1>Olá <?php echo $usuario->getNome() ?>, bem Vindo a Plataforma de Jogos</h1>
<br/>

<a href="jogos/enviarJogo.php">Enviar Jogo</a>
<br/>
<br/>

<a href="logout.php">Fazer logout</a>
