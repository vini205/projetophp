<?php
namespace App\Repository;

use App\Model\Model;

interface Repository
{
    
    /**
     * Lista todos os itens
     * @return array
     */
    public function listar();
    /**
     * Obtém um dados específico do repositório, baseado no ID
     * @param int $id id do item a ser buscado
     * @return void
     */
    public function obter(int $id);
    public function atualizar(Model $model);
    public function remover(int $id);
    public function salvar(Model $model);
}