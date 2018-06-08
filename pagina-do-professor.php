<?php
include_once('dao/DaoUsuario.php');
include_once('dao/DaoJogo.php');
session_start();
$daousuario = new DaoUsuario();
$usuario = $daousuario->getUsuario($_SESSION['id']);
Usuario::checkPermissao(2);

$daojogo = new DaoJogo();
$jogadas = $daojogo->listarJogadas();

?><!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Jogos Educacionais</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>

    <?php include_once("assets/layout/header.php") ?>

    <main role="main" class="container">

        <div class="starter-template">
            <h1>Pagina de controle do professor</h1>
            <hr style="width: auto;">
            <div class="row">
                <div class="col-lg-8">
                    Busca por data: <input type="date" class="form-control " name=""> até <input class="form-control" type="date" name="">
                    <button class="btn btn-dark" type="button">Filtrar</button>
                </div>

                <div class="col-lg-4">
                    <div class="input-group padding-pesquisaProf">
                        <input type="text" class="form-control" placeholder="Pesquisar por RA">
                        <span class="input-group-btn">
                        <button class="btn btn-dark" type="button">Pesquisar</button>
                        </span>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">RA</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Jogo</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <?php 
                if(is_array($jogadas)){
                ?>
                <tbody>
                    <?php
                    foreach ($jogadas as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['ra'] ?></th>
                        <td><?php echo $row['nome_aluno'] ?></td>
                        <td><?php echo $row['nome_jogo'] ?></td>
                        <td><?php echo $row['data_conclusao'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                }
                ?>
            </table>
            <div class="row">
                <div class="col-lg-12 ">
                    <button class="btn btn-dark" type="button"><</button>
                    <button class="btn btn-dark" type="button">1</button>
                    <button class="btn btn-dark" type="button">2</button>
                    <button class="btn btn-dark" type="button">3</button>
                    <button class="btn btn-dark" type="button">4</button>
                    <button class="btn btn-dark" type="button">Última</button>
                    <button class="btn btn-dark" type="button">></button>
                </div>
            </div>
            <br>
            <button type="button" class="btn btn-dark">Imprimir</button>
        </div>

    </main>

    <!-- /.container -->

    <?php include_once('assets/layout/footer.html') ?>

</body>
</html>
