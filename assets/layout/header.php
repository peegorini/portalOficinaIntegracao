    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="align-content: center">
            <a class="navbar-brand" href="index.php">Jogos Educacionais</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jogos</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="jogo1.html">Jogo 1</a>
                            <a class="dropdown-item" href="#">Jogo 2</a>
                            <a class="dropdown-item" href="#">Jogo 3</a>
                            <a class="dropdown-item" href="#">Jogo 4</a>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="professor.php">Pagina do professor</a>

                </li>
                
                <?php if($usuario->getNome()){ ?>
                <span>Olá <?php echo $usuario->getNome() ?>, bem Vindo a Plataforma de Jogos</span>
                <?php } ?>

                </ul>
                <a href="http://portal.utfpr.edu.br/" target="_blank"><img src="assets/img/utf-logo.png" class="logo-utf"></a>
            </div>
        </nav>
    </header>