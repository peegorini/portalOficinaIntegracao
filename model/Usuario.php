<?php
Class Usuario{

	private $ra;
	private $senha;
	private $nivelAcesso;

	public function getRa(){
		return $this->ra;
	}
	
	public function getSenha(){
		return $this->senha;
	}

	public function getNivelAcesso(){
		return $this->nivelAcesso;
	}

	public function setRa($ra){
		$this->ra = $ra;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function setNivelAcesso($nivelAcesso){
		$this->nivelAcesso = $nivelAcesso;
	}

	public function loginUsuario($usuario){

		if (!isset($_SESSION))session_start();

		if($usuario->ra == 123 && $usuario->senha == '1234'){

			$_SESSION['ra'] = $usuario->ra;
			$_SESSION['nivelAcesso'] = $usuario->nivelAcesso;
		}
		else{
			session_destroy();
		}
	}

	public function checkUsuario($nivelAcesso){

		if (!isset($_SESSION))session_start();

		if(!empty($_SESSION['ra']) && $_SESSION['nivelAcesso'] >= $nivelAcesso){
			return true;
		}
		else{
			exit(include('404.html'));
			return false;
		}
	}
}