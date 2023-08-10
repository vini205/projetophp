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
     * Guarda os valores passados por POST
     */
    private array $params = [];

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
     * caso seja um valor válido, ele consegue definir parâmetros
     * @param string $rota A rota é o URI pedido, que será ou não aceito
     * @param string $caminho é o caminho recebido do usuário
     * @return bool
     */
    public function verificaUrl(string $rota, string $caminho){
        preg_match_all('/\{([^\}]*)\}/', $rota, $variables);
        $regex = str_replace('/', '\/', $rota);
        foreach ($variables[0] as $k => $variable) { 
            $replacement = '([a-zA-Z0-9\-\_\ ]+)'; 
            $regex = str_replace($variable, $replacement, $regex); 
    }
        $regex = preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9+])', $regex); 
        $result = preg_match('/^' . $regex. '$/', $caminho, $params); 
        $this->params = $params;
        return $result;
    } 
    
    

    public function getParams(){
        return $this->params;
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
                $dados = $this->verificarParams($rota->getAttribute('dados'));
                call_user_func([$controller,$metodo],$dados);
            } 
        }
    }



    /**
     * Verifica se há ou não parametros a serem passados
     * ao handler
     * @param array $params
     * @return array parametros, caso haja
     */     
    public function verificarParams(array $params){
        if (empty($params) && !isset($this->getParams()[1])){
            return [];
        }
        if(!empty($params)){
            return $params;
        }
        if(isset($this->getParams()[1]))
            return ['id'=> $this->getParams()[1]];

        return [];
    }
 

}