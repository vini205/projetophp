<?php
namespace App;
use App\Model\Model;
Interface repository
{
    public function listar();
    public function salvar(Model $model);
}