<?php
include_once('dao/DaoUsuario.php');
session_start();
$daousuario = new DaoUsuario();
$usuario = $daousuario->getUsuario($_SESSION['id']);
$usuario->checkPermissao(2);

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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>S</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>N</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>S</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Mark</td>
                        <td>N</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Jacob</td>
                        <td>S</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Larry</td>
                        <td>N</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Mark</td>
                        <td>S</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Jacob</td>
                        <td>N</td>
                        <td>03/12/1996</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Larry</td>
                        <td>S</td>
                        <td>03/12/1996</td>
                    </tr>
                </tbody>
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

    <footer class="footer">
        <div class="container">
            <p class="text-muted" style="text-align: center">&copy; UTFPR - Universidade Tecnológica Federal do Paraná.</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
