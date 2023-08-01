<?php
namespace App\Repository;

use App\Model\Model;

interface Repository
{
    
    /**
     * Summary of listar
     * @return array
     */
    public function listar();
    
    public function salvar(Model $model);
}