<?php

namespace App\Model;

use App\Model\Model;

/**
 * Um objeto que guarda uma categoria
 */
class Categoria implements Model
{
    /**
     * Nome da categoria
     * @var string
     */
    private string $nome;
    /**
     * Tipo da categoria
     * @var string
     */
    private string $tipo;
    /**
     * Id da categoria, que 
     * @var int
     */
    private int $id;

    /**
     * Summary of __construct
     * @param string $nome
     * @param string $tipo
     */
    public function __construct(
        string $nome='',
        string $tipo= ''
    ){
        $this->tipo = $tipo;
        $this->nome = $nome;

    }

    /**
     * Summary of setNome
     * @param string $nome
     * @return void
     */
    public function setNome(string $nome){
        $this->nome=$nome;


    }
    /**
     * Summary of getNome
     * @return string
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * Summary of setId
     * @param int $id
     * @return void
     */
    public function setId(int $id){
        $this->id = $id;
    }

    /**
     * Summary of setTipo
     * @param string $tipo
     * @return void
     */
    public function setTipo(string $tipo){
        $this->tipo = $tipo;
    }

    /**
     * Summary of getTipo
     * @return string
     */
    public function getTipo(){
        return $this->tipo;
    }

    /**
     * Summary of getAtribut
     * @param string $atributo
     * @return mixed
     */
    public function getAtribut(string $atributo){
        return $this->{$atributo};
    }
}