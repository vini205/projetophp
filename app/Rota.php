<?php

namespace App;

use App\Controller\Controller; # iremos usar a classe Controller

class Rota 
{
    /**
     * é a rota que envia a certa página
     * @var string 
     */
    private string $caminho;
    private Controller $controller;
    private string $metodo;
    private array $dados;

    /**
     * Summary of __construct
     * @param string $caminho é rota de uma certa página
     * @param Controller $controller Qual é o controlador da rota
     * @param string $metodo métodos necessários
     * @param array $dados dados a serem passados
     */
    public function __construct(
        string $caminho,
        Controller $controller,
        string $metodo,
        array $dados = []
    )
    {
        $this->caminho = $caminho;
        $this->metodo = $metodo;
        $this->controller = $controller;
        $this->dados = $dados;
    }


    /**
     * Um método que reune os getters em um só. 
     * Usado para pegar os atributos
     * @param string $attr the required attribute
     * @return mixed
     */
    public function getAttribute(string $attr)
    {
        return $this->{$attr};
    }
}



/*
# mvc 
    Usaremos um estilo de arquitetura de código chamado mvc.
    Categoria é uma classe modelo, e 
    Criam-se classes modelos, a parte da view e o controle.
    Quando foi lista uma categoria, e quando colocarmos no url o que queremos, usaremos a classe
    Rora para pegar e direcionar parao  controle, que trata de retorna o que foi pedido.
*/