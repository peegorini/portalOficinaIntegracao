<?php
class Jogo {

    private $id;
    private $nome;
    private $descricao;
    private $hash_arquivo;
    private $id_usuario;

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

    public function getIdUsuario(){
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
}