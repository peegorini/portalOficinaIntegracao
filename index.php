<?php
require ("model/Usuario.php");

$msgErro = '';

if($_POST){
    $usuario = new Usuario();
    $usuario->setRa($_POST['ra']);
    $usuario->setSenha($_POST['senha']);

    if ($usuario->loginUsuario()) {
        header("Location: plataforma.php");
    } else {
        $msgErro = 'Dados inválidos, tente novamente.';
    }    
}
?>

<form method="post">

    <?php if(!empty($msgErro)){echo '<p>'.$msgErro.'</p>'; }?>

    RA<br/>
    <input type="text" name="ra"><br/><br/>

    Senha<br/>
    <input type="password" name="senha"><br/><br/>

    <input type="submit" value="Fazer Login"><br/><br/>

    <a href="login/esqueciasenha.php">Esqueci a Senha</a>
    |
    <a href="login/novaconta.php">Criar Conta</a>

</form>
