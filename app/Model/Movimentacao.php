<?php

namespace App\Model;

use App\Model\Model;



/**
 * Classe de Movimentação, que controla todos
 * processos da movimentação 
 */
class Movimentacao implements Model{
    
    /**
     * valor
     * @var float
     */
    private float $valor;
    /**
     * A categoria que rege a movimentação
     * @var Categoria
     */
    private Categoria $categoria;
    /**
     * Descrição do produto
     * @var string
     */
    private string $descricao;
    /**
     * Data da movimentação, que é setada pelo
     * próprio sistema
     * @var string
     */
    private string $data ='';

    /**
     * Prioridade da categoria da movimentação
     * @var int
     */
    private int $prioridade;

    /**
     * Se a categoria da moviemntação é fixa ou variável
     * @var string
     */
    private string $fixo;

    /**
     * 
     * @param float $valor valor 
     * @param \App\Model\Categoria $categoria categoria que rege a movimentação
     * @param string $desc decrição do movimento
     */
    public function __construct(float $valor, Categoria $categoria, string $desc){
        $this->valor = $valor;
        $this->categoria = $categoria;
        $this->descricao = $desc;

        $this->setfixo($categoria);
        $this->setPrioridade($categoria);
    }

	/**
	 * @param string $data 
	 * @return void
	 */
	public function setData(string $data): void {
		$this->data = $data;
	}
    private function setPrioridade($categoria){
        $this->prioridade = $categoria->getPrioridade();
    }

    private function setfixo($categoria){
        $this->fixo = $categoria->getFixo();
    }

    /**
     * Summary of getAtribut
     * @param string $atributo
     * @return mixed
     */
    public function getAtribut(string $atributo ){
        return $this->{$atributo};
    }
}