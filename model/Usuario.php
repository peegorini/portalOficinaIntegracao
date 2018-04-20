<?php
Class Usuario{

    private $id;
    private $ra;
    private $email;
    private $nome;
	private $senha;
	private $nivelAcesso;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

	public function getRa(){
		return $this->ra;
	}

    public function setRa($ra){
        $this->ra = addslashes($ra);
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

	public function getSenha(){
		return $this->senha;
	}

    public function setSenha($senha){
        $this->senha = sha1($senha);
    }

	public function getNivelAcesso(){
		return $this->nivelAcesso;
	}

	public function setNivelAcesso($nivelAcesso){
		$this->nivelAcesso = $nivelAcesso;
	}

    public function checkPermissao($nivelAcesso){

        if (!isset($_SESSION))session_start();

        if(!empty($_SESSION['id']) && $_SESSION['nivelAcesso'] >= $nivelAcesso){
            return true;
        }
        else{
            exit(include('404.html'));
            return false;
        }
    }
}
