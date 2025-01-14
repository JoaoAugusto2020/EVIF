<?php
class Matricula {
  //classe entidade	
  private $idusuario;
  private $idcurso;
  private $matricula;

	public function __construct() {}

  public function getIdusuario(){
    return $this->idusuario;
  }

  public function setIdusuario($idusuario){
    $this->idusuario = $idusuario;

    return $this;
  }

  public function getIdcurso(){
    return $this->idcurso;
  }

  public function setIdcurso($idcurso){
    $this->idcurso = $idcurso;

    return $this;
  }

  public function getMatricula(){
    return $this->matricula;
  }

  public function setMatricula($matricula){
    $this->matricula = $matricula;

    return $this;
  }
}
