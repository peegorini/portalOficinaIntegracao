<?php
require "model/Usuario.php";

if (isset($_POST['ra']) && !empty($_POST['ra'])){
    if (isset($_POST['nome']) && !empty($_POST['nome'])){
        if (isset($_POST['email']) && !empty($_POST['email'])){
            if (isset($_POST['senha']) && !empty($_POST['senha'])){

                $usuario = new Usuario();

                $usuario->setRa(addslashes($_POST['ra']));
                $usuario->setNome(addslashes($_POST['nome']));
                $usuario->setEmail(addslashes($_POST['email']));
                $usuario->setSenha(sha1(addslashes($_POST['senha']))); // Dado encriptografado com SHA-1

                $usuario->salvar();

                // header("Location: ../index.php");
                echo $usuario->getId();
                echo $usuario->getNome();
                exit;

            }
        }
    }
}


?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Novo Aluno</title>
</head>
<body>

<form method="post">

    <h1>Cadastro de Novo Aluno</h1>

    Ra:<br/>
    <input type="text" name="ra"><br/><br/>

    Nome: <br/>
    <input type="text" name="nome"><br/><br/>

    Email<br/>
    <input type="text" name="email"><br/><br/>

    Senha<br/>
    <input type="password" name="senha"><br/><br/>

    <input type="submit" value="Finalizar Cadastro">



</form>

</body>
</html>
