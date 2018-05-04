<!doctype html>
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

        <div class="starter-template">
            <h1>App QR code</h1>
            <hr style="width: auto;">
            <p class="lead alinhamento-texto">
                Faça o download do aplicativo qr code para identificar e separar as vidrarias! <br> 
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, nostrum, facilis.
                Sed ducimus delectus animi maxime sequi a atque at nobis, dolor quae laudantium. Consectetur saepe adipisci
                voluptatibus rem odio!. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, ad quisquam quas
                nobis natus temporibus mollitia. Quibusdam nesciunt ducimus omnis aut placeat repellendus, cum, dolores quia
                quo ad dicta, in! Os slides acima é uma breve apresentação dos jogos Lorem ipsum dolor sit amet, consectetur
                adipisicing elit. Autem, suscipit placeat provident nemo quibusdam culpa delectus? Fuga necessitatibus rem
                possimus magnam, autem, consectetur sequi corporis.
            </p>

            <h3><a class="btn btn-lg btn-dark" href="jogos/jogo04/jogo04.php">Acesse aqui</a></h3>
            
            <!--Modal para imagem depois da leitura do Qr-code-->
            <button class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Modal</button>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Nome da vidraria</h5>
                        </div>
                            <div class="modal-body">
                                <p>Aqui aparece a foto da Vidraria gerada a partir do QR-code</p>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                    </div>
                </div>
                
            <h4>ou</h4>

            <div id="div-download-apk">
                <h4>Baixe via google play ou .apk a versão mobile</h4>
                <br>
                <a href="#"><img src="assets/img/img-playstore.png" class="img-download-apk"></a>
                <a href="#"><img src="assets/img/img-apk.png" class="img-download-apk"></a>
                
            </div>
        </div>
    </main>

    <?php include_once('assets/layout/footer.html') ?>

</body>

</html>