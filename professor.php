<?php
include_once('model/Usuario.php');
session_start();
$usuario = new Usuario($_SESSION['id']);

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
                <div class="col-lg-6">
                    <div class="dropdown padding-pesquisaProf">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Selecionar Turma
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">1º Periodo</a>
                            <a class="dropdown-item" href="#">2º Periodo</a>
                            <a class="dropdown-item" href="#">3º Periodo</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="input-group padding-pesquisaProf">
                        <input type="text" class="form-control" placeholder="Pesquisar por data">
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
                        <th scope="col">Data</th>
                        <th scope="col">Jogou</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>03/12/1996</td>
                        <td>S</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>03/12/1996</td>
                        <td>N</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>03/12/1996</td>
                        <td>S</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Mark</td>
                        <td>03/12/1996</td>
                        <td>N</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Jacob</td>
                        <td>03/12/1996</td>
                        <td>S</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Larry</td>
                        <td>03/12/1996</td>
                        <td>N</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Mark</td>
                        <td>03/12/1996</td>
                        <td>S</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Jacob</td>
                        <td>03/12/1996</td>
                        <td>N</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Larry</td>
                        <td>03/12/1996</td>
                        <td>S</td>
                    </tr>
                </tbody>
            </table>
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
