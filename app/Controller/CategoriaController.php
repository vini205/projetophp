<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\Categoria;
use  App\Repository\categoriaRepository;

class CategoriaController extends Controller
{
    private categoriaRepository $repository;

    public function __construct(categoriaRepository $repository){
        $this->repository = $repository;
    }

    public function cadastrar()
    {
        $this->render('panel', 'templates/cadastro-categ.php');
    }

    public function novo(array $dados){
        $nome = $dados['nome'];
        $tipo = $dados['tipo'];

        $categoria = new Categoria($nome, $tipo);

        $this->repository->salvar($categoria);

        $this->listarCategorias();
    }

    public function listarCategorias()
    {
        $categorias = $this->repository->listar();
        $this->render('panel', 'templates/listcateg.php', $categorias);
    }


}