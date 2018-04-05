<?php
require "dao/connectionManager.php";

if (!empty($_GET['token'])){

    $token = $_GET['token'];

    $sql = "SELECT * FROM usuarios_tokens WHERE hash = :hash AND usado = 0 AND expira_em > now()";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":hash", $token);
    $sql->execute();

    if ($sql->rowCount() > 0){

        $sql = $sql->fetch();
        $id = $sql['id_usuario'];

        if(!empty($_POST["senha"])){
            $senha = sha1(addslashes($_POST['senha']));

            $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":senha",$senha);
            $sql->bindValue(":id",$id);
            $sql->execute();

            $sql = "UPDATE usuarios_tokens SET usado = 1 WHERE hash = :hash";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":hash",$token);
            $sql->execute();

            echo "Senha alterada com sucesso!";
            exit;
        }
    } else {
        echo "Token inválido ou usado";
        exit;
    }
}
?>

<form method="post">
    Digite a nova Senha: <br/>
    <input type="password" name="senha"/><br/>
    <input type="submit" value="Mudar Senha"/>
</form>
