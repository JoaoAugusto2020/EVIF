<?php
class Inscricao {
  //classe entidade	
  private $idinscricao;
  private $idatividade;
  private $idusuario;
  private $datainscricao;

	public function __construct() {}
    
    public function getIdinscricao(){
        return $this->idinscricao;
    }

    public function setIdinscricao($idinscricao){
        $this->idinscricao = $idinscricao;

        return $this;
    }

    public function getIdatividade(){
        return $this->idatividade;
    }

    public function setIdatividade($idatividade){
        $this->idatividade = $idatividade;

        return $this;
    }

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getDatainscricao(){
        return $this->datainscricao;
    }

    public function setDatainscricao($datainscricao){
        $this->datainscricao = $datainscricao;

        return $this;
    }
}
