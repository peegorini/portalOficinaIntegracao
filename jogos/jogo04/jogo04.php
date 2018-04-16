<!DOCTYPE html>
<html>
<head>
    <title>Jogo 04 - Projeto Oficina</title>
    <script type="text/javascript" src="assets/js/instascan.min.js"></script>
</head>
<body>
<video id="preview"></video>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        criarCookie(content);
        window.location.href = "descricao.php";
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });

    function criarCookie(valor) {
        var data = new Date();
        data.setTime(data.getTime()+60000);
        document.cookie = "qrcode="+valor+"; expires="+data.toUTCString()+"; path=/";
    }
</script>
</body>
</html>
