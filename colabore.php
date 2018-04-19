<?php
require_once "dao/ConnManager.php";

$msg = '';
$msgStatus = false;

if(!empty($_POST)){

    $titulo         = $_POST['titulo'];
    $nome           = $_POST['nome'];
    $email          = $_POST['email'];
    $universidade   = $_POST['universidade'];
    $curso          = $_POST['curso'];
    $descricao      = $_POST['descricao'];
    $arquivo        = $_POST['arquivo'];

    $link = "http://localhost/portaloficinaintegracao/redefinir.php?token=".$token;

    $uid = md5(uniqid(time()));

    $mensagem = "Titulo: $titulo <br>
                Nome: $nome <br>
                Email: $email <br>
                Universidade: $universidade <br>
                Curso: $curso <br>
                Descricao: ".nl2br($descricao)."<br>
                Arquivo: $arquivo<br><br>
                <strong>Confira o arquivo em anexo</strong>";

    $assunto = "Novo envio de jogo para a plataforma";
    
    $file = $path.$filename;
    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);

    // header
    $header = "To: Elio <eliocostac4@gmail.com>\r\n";
    $header .= "From: ".$nome." <".$email.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

    // message & attachment
    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $mensagem."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";

    

    if (mail('eliocostac4@gmail.com', $assunto, $nmessage, $header)) {
        return true; // Or do something here
    } else {
      return false;
    }

}

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

        <div class="starter-template">
            <h1>Colabore com a Plataforma</h1>
            <br>
            <p class="lead alinhamento-texto ">Aqui uma breve descrição sobre o que é o projeto dos jogos educacionais. Lorem ipsum dolor sit amet, consectetur
                adipisicing elit. Quisquam, nostrum, facilis. Sed ducimus delectus animi maxime sequi a atque at nobis, dolor
                quae laudantium. Consectetur saepe adipisci voluptatibus rem odio!. Lorem ipsum dolor sit amet, consectetur
                adipisicing elit. Veniam, ad quisquam quas nobis natus temporibus mollitia. Quibusdam nesciunt ducimus omnis
                aut placeat repellendus, cum, dolores quia quo ad dicta, in! Os slides acima é uma breve apresentação dos
                jogos Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, suscipit placeat provident nemo quibusdam
                culpa delectus? Fuga necessitatibus rem possimus magnam, autem, consectetur sequi corporis. Eum perspiciatis,
                tempore sed qui Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur totam fuga facilis
                animi laudantium numquam, omnis quo suscipit ea. Minus totam fugiat obcaecati, tempora eveniet id exercitationem,
                libero voluptatibus possimus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum assumenda suscipit
                deleniti beatae consectetur repellendus? Nisi, quae? Iure earum fuga consequuntur ut voluptatibus! Id harum
                expedita voluptatum sequi cum voluptas! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem
                harum eum sed excepturi repellendus mollitia fugiat saepe eligendi. Voluptatibus inventore, ex incidunt nobis
                officia ullam illo culpa temporibus corporis quam. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Eius esse amet alias, earum ullam laboriosam at ea nihil temporibus vel vitae vero velit eligendi perspiciatis
                exercitationem adipisci, aspernatur repellat, doloribus.
                <br>
            </p>
            <br>
            <br>
            <span class="campo-requerido" id="campo-requerido"> * </span>
            <span id="campo-requerido">Campos Obrigatórios</span>
        </div>

        <div class="starter-template">

            <form id="formulario" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="InputTitulo">Titulo </label>
                            <label for="" class="campo-requerido">*</label>
                            <input type="text" class="form-control" id="InputTitulo" name="titulo" placeholder="Título do jogo" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputNome">Nome </label>
                            <label for="" class="campo-requerido">*</label>
                            <input type="text" class="form-control" id="InputNome" name="nome" placeholder="Nome completo" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputEmail">E-mail </label>
                            <label for="" class="campo-requerido">*</label>
                            <input type="email" class="form-control" id="InputEmail" name="email" placeholder="E-mail" required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputUniversidade">Universidade </label>
                            <input type="text" class="form-control" id="InputUniversidade" name="universidade" placeholder="Digite o nome da universidade">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputCurso">Curso </label>
                            <input type="text" class="form-control" id="InputCurso" name="curso" placeholder="Digite o nome do curso">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="textareaColabore">Descrição do Jogo </label>
                    <label for="" class="campo-requerido">*</label>
                    <textarea class="form-control" id="textareaColabore" rows="10" name="descricao" placeholder="Escreva aqui uma breve descrição do jogo e as instruções, seguindo as regras estabelecidas acima...." required></textarea>
                </div>
                <div class="form-group">
                    <label for="EscolherArquivo"></label>
                    <input type="file" class="form-control-file" name="arquivo" id="EscolherArquivo" required>
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
        </div>
    </main>

    <?php include_once('assets/layout/footer.html') ?>

</body>

</html>