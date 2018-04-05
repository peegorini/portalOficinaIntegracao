<?php

class Jogo {

    private $id;
    private $nome;
    private $descricao;
    private $hash_arquivo;
    private $id_usuario;

    private $pdo;

    public function __construct($i = null){

        try{
            $this->pdo = new PDO("mysql:dbname=projetooficina;host=localhost","root","");
        } catch (PDOException $e){
            exit;
        }

        if(!empty($i)) {

            $i = addslashes($i);

            $sql = $this->pdo->prepare("SELECT * FROM jogos WHERE id = :id");
            $sql->bindValue(":id", $i);
            $sql->execute();

            if($sql->rowCount() > 0) {

                $dados = $sql->fetch();

                $this->setId($dados['id']);
                $this->setNome($dados['nome']);
                $this->setDescricao($dados['descricao']);
                $this->setHashArquivo($dados['hash_arquivo']);
                $this->setIdUsuario($dados['id_usuario']);
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getHashArquivo(){
        return $this->hash_arquivo;
    }

    public function setHashArquivo($hash_arquivo){
        $this->hash_arquivo = $hash_arquivo;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function salvar(){
        if(!empty($this->getId())){
            $sql = $this->pdo->prepare("UPDATE jogos SET nome = :nome, descricao = :descricao WHERE id = :id");
            $sql->bindValue(":id",$this->getId());
            $sql->bindValue(":nome",$this->getNome());
            $sql->bindValue(":descricao",$this->getDescricao());
            $sql->execute();
        } else {
            $sql = $this->pdo->prepare("INSERT INTO jogos SET nome = :nome, descricao = :descricao, hash_arquivo = :hasharquivo, id_usuario = :id_usuario");
            $sql->bindValue(":nome",$this->getNome());
            $sql->bindValue(":descricao", $this->getDescricao());
            $sql->bindValue(":hasharquivo", $this->getHashArquivo());
            $sql->bindValue(":id_usuario",$this->getIdUsuario());
            $sql->execute();
            $this->getId($this->pdo->lastInsertId());
        }
    }

    public function buscaJogo($chave, $valor){
        $chave = addslashes($chave);
        $valor = addslashes($valor);

        $sql = "SELECT * FROM jogo WHERE :chave = :valor";
        $sql = $this->pdo->prepare($sql);
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