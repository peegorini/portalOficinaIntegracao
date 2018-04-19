<?php
include_once "dao/DaoUsuario.php";
session_start();
$usuario = new DaoUsuario();
$usuario = $usuario->getUsuario($_SESSION['id']);

?><!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/img/favicon.ico">

  <title>Jogos Educacionais</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <?php include_once('assets/layout/header.php') ?>

  <main role="main" class="container">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Jogo 1</h1>
              <p class="alinhamento-texto">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.
                Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p>
                <a class="btn btn-lg btn-primary" href="jogo1.html" role="button">Jogar</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Jogo 2</h1>
              <p class="alinhamento-texto">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.
                Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p>
                <a class="btn btn-lg btn-primary" href="#" role="button">Jogar</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Jogo 3</h1>
              <p class="alinhamento-texto">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.
                Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p>
                <a class="btn btn-lg btn-primary" href="#" role="button">Jogar</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Jogo 4</h1>
              <p class="alinhamento-texto">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.
                Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p>
                <a class="btn btn-lg btn-primary" href="#" role="button">Jogar</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="starter-template">
      <h1>Jogos Educacionais </h1>
      <p class="lead alinhamento-texto">Aqui uma breve descrição sobre o que é o projeto dos jogos educacionais. Lorem ipsum dolor sit amet, consectetur adipisicing
        elit. Quisquam, nostrum, facilis. Sed ducimus delectus animi maxime sequi a atque at nobis, dolor quae laudantium.
        Consectetur saepe adipisci voluptatibus rem odio!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam,
        ad quisquam quas nobis natus temporibus mollitia. Quibusdam nesciunt ducimus omnis aut placeat repellendus, cum,
        dolores quia quo ad dicta, in! Os slides acima é uma breve apresentação dos jogos Lorem ipsum dolor sit amet, consectetur
        adipisicing elit. Autem, suscipit placeat provident nemo quibusdam culpa delectus? Fuga necessitatibus rem possimus
        magnam, autem, consectetur sequi corporis. Eum perspiciatis, tempore sed qui Lorem ipsum dolor sit amet, consectetur
        adipisicing elit. Consequatur totam fuga facilis animi laudantium numquam, omnis quo suscipit ea. Minus totam fugiat
        obcaecati, tempora eveniet id exercitationem, libero voluptatibus possimus! Lorem ipsum dolor sit amet, consectetur
        adipisicing elit. Harum assumenda suscipit deleniti beatae consectetur repellendus? Nisi, quae? Iure earum fuga consequuntur
        ut voluptatibus! Id harum expedita voluptatum sequi cum voluptas! Lorem ipsum dolor sit amet, consectetur adipisicing
        elit. Quidem harum eum sed excepturi repellendus mollitia fugiat saepe eligendi. Voluptatibus inventore, ex incidunt
        nobis officia ullam illo culpa temporibus corporis quam. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Eius esse amet alias, earum ullam laboriosam at ea nihil temporibus vel vitae vero velit eligendi perspiciatis exercitationem
        adipisci, aspernatur repellat, doloribus.
        <br>
      </p>
    </div>
  </main>

  <?php include_once('assets/layout/footer.html') ?>

</body>

</html>