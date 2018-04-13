<?php
require_once 'ConnManager.php';
require_once 'model/Jogo.php';

class DaoJogo extends ConnManager{

    private $conn;

    public function __construct(){
        $dbcon = new parent();
        $this->conn = $dbcon->connect();
    }

    public function getJogo($i = null){

        if(!empty($i)) {

            $i = addslashes($i);

            $sql = $this->conn->prepare("SELECT * FROM jogos WHERE id = :id");
            $sql->bindValue(":id", $i);
            $sql->execute();

            if($sql->rowCount() > 0) {

                $dados = $sql->fetch();
                $jogo = new Jogo();

                $jogo->setId($dados['id']);
                $jogo->setNome($dados['nome']);
                $jogo->setDescricao($dados['descricao']);
                $jogo->setHashArquivo($dados['hash_arquivo']);
                $jogo->setIdUsuario($dados['id_usuario']);
                return $jogo;
            }
        }
    }

    public function salvar($jogo){
        if(!empty($jogo->getId())){
            $sql = $this->conn->prepare("UPDATE jogos SET nome = :nome, descricao = :descricao WHERE id = :id");
            $sql->bindValue(":id",$jogo->getId());
            $sql->bindValue(":nome",$jogo->getNome());
            $sql->bindValue(":descricao",$jogo->getDescricao());
            $sql->execute();
        } else {
            $sql = $this->conn->prepare("INSERT INTO jogos SET nome = :nome, descricao = :descricao, hash_arquivo = :hasharquivo, id_usuario = :id_usuario");
            $sql->bindValue(":nome",$jogo->getNome());
            $sql->bindValue(":descricao", $jogo->getDescricao());
            $sql->bindValue(":hasharquivo", $jogo->getHashArquivo());
            $sql->bindValue(":id_usuario",$jogo->getIdUsuario());
            $sql->execute();
            $jogo->getId($this->conn->lastInsertId());
        }
    }

    public function buscaJogo($chave, $valor){
        $chave = addslashes($chave);
        $valor = addslashes($valor);

        $sql = "SELECT * FROM jogo WHERE :chave = :valor";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":chave",$chave);
        $sql->bindValue(":valor",$valor);
        $sql->execute();

        if($sql->rowCount() > 0){

            $dados = $sql->fetch();

            $this->setId($dados['id']);
            $this->setNome($dados['nome']);
            $this->setDescricao($dados['descricao']);
            $this->setHashArquivo($dados['hash_arquivo']);

        }
    }
}