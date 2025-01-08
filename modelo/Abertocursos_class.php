<?php
class Abertocursos {
  //classe entidade	
  private $idatividade;
  private $idcurso;
  private $periodo;

	public function __construct() {}

  public function getIdatividade(){
    return $this->idatividade;
  }

  public function setIdatividade($idatividade){
    $this->idatividade = $idatividade;

    return $this;
  }

  public function getIdcurso(){
    return $this->idcurso;
  }

  public function setIdcurso($idcurso){
    $this->idcurso = $idcurso;

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
