<?php

class Categoria
{
    private string $nome;
    private string $tipo;
    private int $id;

    public function __construct(
        string $nome='',
        string $tipo= ''
    ){
        $this->tipo = $tipo;
        $this->nome = $nome;

    }

    public function setNome(string $nome){
        $this->nome=$nome;


    }
    public function getNome(){
        return $this->nome;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setTipo(string $tipo){
        $this->tipo = $tipo;
    }

    public function getTipo(){
        return $this->tipo;
    }
}