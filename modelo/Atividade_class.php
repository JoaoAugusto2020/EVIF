<?php
class Atividade {
  //classe entidade	
  private $idatividade;
  private $tipo;
  private $titulo;
  private $professor;
  private $descricao;
  private $local;
  private $datainicio;
  private $datafim;
  private $aberto;

	public function __construct() {}
  
  public function getIdatividade(){
    return $this->idatividade;
  }

  public function setIdatividade($idatividade){
    $this->idatividade = $idatividade;

    return $this;
  }

  public function getTipo(){
    return $this->tipo;
  }

  public function setTipo($tipo){
    $this->tipo = $tipo;

    return $this;
  }

  public function getTitulo(){
    return $this->titulo;
  }

  public function setTitulo($titulo){
    $this->titulo = $titulo;

    return $this;
  }

  public function getProfessor(){
    return $this->professor;
  }

  public function setProfessor($professor){
    $this->professor = $professor;

    return $this;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;

    return $this;
  }

  public function getLocal(){
    return $this->local;
  }

  public function setLocal($local){
    $this->local = $local;

    return $this;
  }

  public function getDatainicio(){
    return $this->datainicio;
  }

  public function setDatainicio($datainicio){
    $this->datainicio = $datainicio;

    return $this;
  }

  public function getDatafim(){
    return $this->datafim;
  }

  public function setDatafim($datafim){
    $this->datafim = $datafim;

    return $this;
  }

  public function getAberto(){
    return $this->aberto;
  }

  public function setAberto($aberto){
    $this->aberto = $aberto;

    return $this;
  }
}
