<?php

class QRCode {

    private $nome;
    private $hash;
    private $descricao;
    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=projetooficina;host=localhost","root","");
        } catch (PDOException $e){
            exit;
        }
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getHash(){
        return $this->hash;
    }

    public function setHash($hash){
        $this->hash = $hash;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function buscaQRCode($qrcode){
        $qrcode = addslashes($qrcode);

        $sql = "SELECT * FROM qrcode WHERE hash = :hash";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":hash",$qrcode);
        $sql->execute();

        if($sql->rowCount() > 0){

            $dados = $sql->fetch();

            $this->setNome($dados['nome']);
            $this->setHash($dados['hash']);
            $this->setDescricao($dados['descricao']);

            return true;
        } else {
            return false;
        }
    }


}