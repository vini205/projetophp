<?php

namespace App\Controller;

use App\Controller\Controller;

class CategoriaController extends Controller
{
    public function cadastrar()
    {
        $this->render('panel', 'templates/cadastro-categ.php');
    }
    public function listarCategorias()
    {
        $this->render('panel', 'templates/listcateg.php');
    }
}