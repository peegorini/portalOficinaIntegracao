<?php
include_once("model/usuario.php");
Usuario::checkUsuario(1);


echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?><!DOCTYPE html>
<html>
<head>
	<title>painel logado nivel 1</title>
</head>
<body>


<h1>conteudo do painel</h1>



</body>
</html>