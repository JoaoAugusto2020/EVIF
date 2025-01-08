<?php
class Matricula {
  //classe entidade	
  private $idusuario;
  private $idcurso;
  private $matricula;
  private $periodo;

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

  public function getPeriodo(){
    return $this->periodo;
  }

  public function setPeriodo($periodo){
    $this->periodo = $periodo;

    return $this;
  }
}
