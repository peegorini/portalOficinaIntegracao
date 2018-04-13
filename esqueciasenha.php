<?php
require_once "dao/ConnManager.php";

if(!empty($_POST['ra'])){

    $ra = addslashes($_POST['ra']);

    $sql = "SELECT * FROM usuarios WHERE ra = :ra";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":ra",$ra);
    $sql->execute();

    if($sql->rowCount() > 0){
        $sql = $sql->fetch();
        $id = $sql['id'];

        $token = sha1(time().rand(0,99999).rand(0,99999));

        $sql = "INSERT INTO usuarios_tokens SET id_usuario = :id_usuario, hash = :hash, expira_em = :expira_em";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id);
        $sql->bindValue(":hash", $token);
        $sql->bindValue(":expira_em", date('Y-m-d H:i', strtotime('+1 months')));
        $sql->execute();

        $link = "http://localhost/portaloficinaintegracao/redefinir.php?token=".$token;

        $mensagem = "Clique no link para redefinir sua senha:<br/>".$link;

        $assunto = "Redefinição de senha";

        $headers = 'From: teste@teste.com.br'."\r\n".'X-Mailer: PHP/'.phpversion();

        // mail($email, $assunto,$mensagem,$headers);

        echo $mensagem;
        exit;
    }
}
?>

<form method="post">
    RA: <br/>
    <input type="text" name="ra"/> <br/><br/>

    <input type="submit" value="Enviar"/>
</form>