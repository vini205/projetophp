<?php

namespace App;

use App\Rota;

class Router
{

    /**
     * O caminho que foi passado pela URL, e que deve ser tratado
     * @var string 
     */
    private string $caminho;

    /**
     * Todas as rotas dísponíveis para o usuário
     * @var array 
     */
    private array $rotas = [];

    /**
     * Adiciona os parametros essênciais
     * @param mixed $caminho é o caminho recebido do usuário
     */
    public function __construct(
        $caminho
    ){
        $this->caminho = $caminho;
    }



    /**
     * Adiciona rotas no Router
     * @param \App\Rota $rota a rota a ser adicionada
     * @return void
     */
    public function add(Rota $rota){
        $caminho = $rota->getAttribute('caminho');
        $this->rotas[$caminho] = $rota;
    }

    /**
     * Recebe um caminho e verifica para onde deve ser direcionao o chamado, 
     * caso seja um valor válido
     * @param string $rota A rota é o URI pedido, que será ou não aceito
     * @param string $caminho é o caminho recebido do usuário
     * @return bool
     */
    public function verificaUrl(string $rota, string $caminho){
     
        $rota = str_replace('/','\/', $rota);   // Arruma problema com \
    
        if (preg_match('/^'.$rota.'$/',$caminho)) {
            return true;
        }   
        return false;
    }
    
    /**
     * A função que lida com os chamados
     * @return void
     */
    public function handler ()
    {
        foreach($this->rotas as $rota){

            $res = $this->verificaUrl($rota->getAttribute('caminho'), $this->caminho);
            if($res){
                $controller = $rota->getAttribute('controller');
                $metodo = $rota->getAttribute('metodo');
                call_user_func([$controller,$metodo],$rota->getAttribute('dados'));
            }
        }
    }
}