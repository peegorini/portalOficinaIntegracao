<?php

Class ConnManager{

    public function connect(){

        // Sistema Gerenciador de Banco de Dados utilizado
        $sgdb = "mysql";

        // Nome do Banco de Dados
        $dbname = "projetooficina";

        // Host do Banco de Dados
        $dbhost = "localhost";

        // Usuário do Banco de Dados
        $dbuser = "root";

        // Senha do Usuário setado acima
        $dbpass = "r3mobis-";

        // Montagem da string de conexão
        $dsn = $sgdb . ":dbname=" . $dbname . ";host=" . $dbhost;

        try {
            return new PDO($dsn, $dbuser, $dbpass);
        } catch (PDOException $e) {
            echo "Falha na conexão com o Banco de Dados!";
            exit;
        }
    }
}