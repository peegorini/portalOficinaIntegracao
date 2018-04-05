<?php

Class Usuario{

    private $id;
    private $ra;
    private $email;
    private $nome;
	private $senha;
	private $nivelAcesso;

	private $pdo;

    public function __construct($i = null){

        try{
            $this->pdo = new PDO("mysql:dbname=projetooficina;host=localhost","root","");
        } catch (PDOException $e){
            exit;
        }

        if(!empty($i)) {

            $i = addslashes($i);

            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $i);
            $sql->execute();

            if($sql->rowCount() > 0) {

                $dados = $sql->fetch();

                $this->setId($dados['id']);
                $this->setRa($dados['ra']);
                $this->setNome($dados['nome']);
                $this->setEmail($dados['email']);
                $this->setSenha($dados['senha']);
                $this->setNivelAcesso($dados['niveldeacesso']);
            }
        }
    }

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
        $this->senha = sha1(addslashes($senha));
    }

	public function getNivelAcesso(){
		return $this->nivelAcesso;
	}

	public function setNivelAcesso($nivelAcesso){
		$this->nivelAcesso = $nivelAcesso;
	}

    public function delete(){
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(":id",$this->getId());
        $sql->execute();
    }

    public function salvar(){
        if(!empty($this->getId())){
            $sql = $this->pdo->prepare("UPDATE usuarios SET ra = :ra, nome = :nome, email = :email, senha = :senha WHERE id = :id");
            $sql->bindValue(":id",$this->getId());
            $sql->bindValue(":ra",$this->getRa());
            $sql->bindValue(":nome",$this->getNome());
            $sql->bindValue(":email",$this->getEmail());
            $sql->bindValue(":senha",$this->getSenha());
            $sql->execute();
        } else {
            $sql = $this->pdo->prepare("INSERT INTO usuarios SET ra = :ra, nome = :nome, email = :email, senha = :senha");
            $sql->bindValue(":ra",$this->getRa());
            $sql->bindValue(":nome",$this->getNome());
            $sql->bindValue(":email",$this->getEmail());
            $sql->bindValue(":senha",$this->getSenha());
            $sql->execute();
            $this->setId($this->pdo->lastInsertId());
            $this->setNivelAcesso(1);
        }
    }

    public function buscaUsuario($chave, $valor){
        $chave = addslashes($chave);
        $valor = addslashes($valor);

        $sql = "SELECT * FROM usuarios WHERE :chave = :valor";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":chave",$chave);
        $sql->bindValue(":valor",$valor);
        $sql->execute();

        if($sql->rowCount() > 0){

            $dados = $sql->fetch();

            $this->setId($dados['id']);
            $this->setRa($dados['ra']);
            $this->setNome($dados['nome']);
            $this->setEmail($dados['email']);
            $this->setSenha($dados['senha']);
            $this->setNivelAcesso($dados['niveldeacesso']);

        }
    }

    public function loginUsuario(){
        
        $sql = "SELECT * FROM usuarios WHERE ra = :ra AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":ra",$this->getRa());
        $sql->bindValue(":senha",$this->getSenha());
        $sql->execute();

        if (!isset($_SESSION))session_start();

        if($sql->rowCount() > 0){

            $dados = $sql->fetch();
            
            $_SESSION['id'] = $dados['id'];
            $_SESSION['nivelAcesso'] = $dados['niveldeacesso'];
            return true;
        }
        session_destroy();
        return false;
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
