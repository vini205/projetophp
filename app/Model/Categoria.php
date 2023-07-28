<?php

namespace App;

use App\Model\Model;

class Categoria implements Model
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

    public function getAtribut(string $atributo){
        return $this->{$atributo};
    }
}