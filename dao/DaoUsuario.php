<?php
require_once 'ConnManager.php';
require_once 'model/Usuario.php';

class DaoUsuario extends ConnManager {

    private $conn;

    public function __construct(){
        $dbcon = new parent();
        $this->conn = $dbcon->connect();
        session_start();
    }

    public function getUsuario($i = null) {

        if(!empty($i)) {

            $i = addslashes($i);

            $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $i);
            $sql->execute();

            if($sql->rowCount() > 0) {

                $dados = $sql->fetch();
                $user = new Usuario();

                $user->setId($dados['id']);
                $user->setRa($dados['ra']);
                $user->setNome($dados['nome']);
                $user->setEmail($dados['email']);
                $user->setSenha($dados['senha']);
                $user->setNivelAcesso($dados['niveldeacesso']);
                return $user;
            }
        }
        return null;
    }

    public function delete(){
        $sql = $this->conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(":id",$this->getId());
        $sql->execute();
    }

    public function salvar(&$usuario){

        if(!empty($usuario->getId())){
            $sql = $this->conn->prepare("UPDATE usuarios SET ra = :ra, nome = :nome, email = :email, senha = :senha WHERE id = :id");
            $sql->bindValue(":id",$usuario->getId());
            $sql->bindValue(":ra",$usuario->getRa());
            $sql->bindValue(":nome",$usuario->getNome());
            $sql->bindValue(":email",$usuario->getEmail());
            $sql->bindValue(":senha",$usuario->getSenha());
            $sql->execute();
        } else {

            // Verifica que se ja existe um usuario no banco
            $sqlChecagem = $this->conn->prepare("SELECT * FROM usuarios WHERE ra = :ra OR email = :email");
            $sqlChecagem->bindValue(":ra",$usuario->getRa());
            $sqlChecagem->bindValue(":email",$usuario->getEmail());
            $sqlChecagem->execute();
            $dados = $sqlChecagem->fetch();
            
            if(!empty($dados['id'])){
                return false;
            }

            $sql = $this->conn->prepare("INSERT INTO usuarios SET ra = :ra, nome = :nome, email = :email, senha = :senha, niveldeacesso = :niveldeacesso");
            $sql->bindValue(":ra",$usuario->getRa());
            $sql->bindValue(":nome",$usuario->getNome());
            $sql->bindValue(":email",$usuario->getEmail());
            $sql->bindValue(":senha",$usuario->getSenha());
            $sql->bindValue(":niveldeacesso",$usuario->getNivelAcesso());
            $sql->execute();
            $usuario->setId($this->conn->lastInsertId());
            $usuario->setNivelAcesso(1);
            return true;
        }
    }

    public function buscaUsuario($chave, $valor){
        $chave = addslashes($chave);
        $valor = addslashes($valor);

        $sql = "SELECT * FROM usuarios WHERE :chave = :valor";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":chave",$chave);
        $sql->bindValue(":valor",$valor);
        $sql->execute();

        if($sql->rowCount() > 0){

            $dados = $sql->fetch();
            $user = new Usuario();

            $user->setId($dados['id']);
            $user->setRa($dados['ra']);
            $user->setNome($dados['nome']);
            $user->setEmail($dados['email']);
            $user->setSenha($dados['senha']);
            $user->setNivelAcesso($dados['niveldeacesso']);

        }
    }

    public function loginUsuario(&$usuario){

        $sql = "SELECT * FROM usuarios WHERE ra = :ra AND senha = :senha";
        $sql = $this->conn->prepare($sql);
        $sql->bindValue(":ra",$usuario->getRa());
        $sql->bindValue(":senha",$usuario->getSenha());
        $sql->execute();

        if (!isset($_SESSION))session_start();

        if($sql->rowCount() > 0){

            $dados = $sql->fetch();

            $usuario->setNivelAcesso($dados['niveldeacesso']);
            $usuario->setNome($dados['nome']);
            $usuario->setEmail($dados['email']);
            $usuario->setId($dados['id']);

            $_SESSION['id'] = $dados['id'];
            $_SESSION['nivelAcesso'] = $dados['niveldeacesso'];

            return true;
        }
        session_destroy();
        return false;
    }
}