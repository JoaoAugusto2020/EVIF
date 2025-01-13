<?php
class Solicitacao {
  //classe entidade	
  private $idsolicitacao;
  private $idusuario;
  private $nivel;
  private $status;

	public function __construct() {}

  public function getIdsolicitacao(){
      return $this->idsolicitacao;
  }

  public function setIdsolicitacao($idsolicitacao){
      $this->idsolicitacao = $idsolicitacao;

      return $this;
  }

  public function getIdusuario(){
      return $this->idusuario;
  }

  public function setIdusuario($idusuario){
      $this->idusuario = $idusuario;

      return $this;
  }

  public function getNivel(){
      return $this->nivel;
  }

  public function setNivel($nivel){
      $this->nivel = $nivel;

      return $this;
  }

  public function getStatus(){
      return $this->status;
  }

  public function setStatus($status){
      $this->status = $status;

      return $this;
  }
}
