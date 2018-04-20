<?php
require_once "dao/ConnManager.php";

$msg = '';
$msgStatus = false;

if($_POST && isset($_FILES['arquivo'])){

    $recipient_email    = 'eliocostac4@gmail.com';
        
    //Get uploaded file data
    $file_tmp_name    = $_FILES['arquivo']['tmp_name'];
    $file_name        = $_FILES['arquivo']['name'];
    $file_size        = $_FILES['arquivo']['size'];
    $file_type        = $_FILES['arquivo']['type'];
    $file_error       = $_FILES['arquivo']['error'];

    $titulo         = $_POST['titulo'];
    $nome           = $_POST['nome'];
    $email          = $_POST['email'];
    $universidade   = $_POST['universidade'];
    $curso          = $_POST['curso'];
    $descricao      = $_POST['descricao'];
    $arquivo        = $_POST['arquivo'];

    if($file_error > 0){
        die('Arquivo não suportado, envie apenas .zip');
    }

    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));

    $boundary = md5(time());
    //header
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "To: Elio Machado Costa <$recipient_email>\r\n";
    $headers .= "From: $nome <$email>\r\n"; 
    $headers .= "Reply-To: Elio Machado Costa <elio@alunos.utfpr.edu.br>\r\n"; 
    $headers .= "Return-Path: Elio Machado Costa <elio@alunos.utfpr.edu.br>\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
    $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
    

    $message = "<html><head></head><body>Titulo: $titulo <br>
                Nome: $nome <br>
                Email: $email <br>
                Universidade: $universidade <br>
                Curso: $curso <br>
                Descricao: ".nl2br($descricao)."<br>
                Arquivo: $arquivo<br><br>
                <strong>Confira o arquivo em anexo</strong></body></html>";
    $subject = "Novo envio de jogo para a plataforma";

    //plain text 
    $body = "--$boundary\r\n";
    $body .= "MIME-Version: 1.0\r\n";
    $body .= "Content-Type: text/html; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
    $body .= chunk_split(base64_encode($message)); 
    
    //attachment
    $body .= "--$boundary\r\n";
    $body .="Content-Type: $file_type; name=".$file_name."\r\n";
    $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
    $body .= $encoded_content; 
    
    $sentMail = mail($recipient_email, $subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {       
        die('Thank you for your email');
    }else{
        die('Could not send mail! Please check your PHP mail configuration.');  
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

            <form enctype="multipart/form-data" id="formulario" method="POST">
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