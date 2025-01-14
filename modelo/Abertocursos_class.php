<?php
class Abertocursos {
  //classe entidade	
  private $idatividadecurso;
  private $curso;
  private $titulo;

	public function __construct() {}

  public function getIdatividadecurso(){
    return $this->idatividadecurso;
  }

  public function setIdatividadecurso($idatividadecurso){
    $this->idatividadecurso = $idatividadecurso;

    return $this;
  }

  public function getCurso(){
    return $this->curso;
  }

  public function setCurso($curso){
    $this->curso = $curso;

    return $this;
  }

  public function getTitulo(){
    return $this->titulo;
  }

  public function setTitulo($titulo){
    $this->titulo = $titulo;

    return $this;
  }
}
