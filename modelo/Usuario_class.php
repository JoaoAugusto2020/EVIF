<?php
class Usuario {
    //classe entidade	
    private $idusuario;
    private $nome;
    private $email;
    private $senha;
    private $nivel;
    private $datacriacao;

	public function __construct() {}

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;

        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;

        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;

        return $this;
    }

    public function getNivel(){
        return $this->nivel;
    }

    public function setNivel($nivel){
        $this->nivel = $nivel;

        return $this;
    }

    public function getDatacriacao(){
        return $this->datacriacao;
    }

    public function setDatacriacao($datacriacao){
        $this->datacriacao = $datacriacao;

        return $this;
    }
}
