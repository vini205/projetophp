<?php

namespace App\Controller; #informa que o controller esta dentro da pasta app.

/**
 * é responsável por renderizar a página e outros métodos
 */
class Controller
{
    /**
     * Summary of listar
     * @return void
     */

    public function render($template, $conteudo)
    {
        
       require __DIR__ . '/../../admin/' . $template . '.php';
    }

    
}