<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\Categoria;
use  App\Repository\categoriaRepository;

class CategoriaController extends Controller
{
    /**
     * Guarda o repositório e seus métodos
     * @var categoriaRepository
     */
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

    /**
     * Redireciona para a página de editar categoria passando
     * a categoria baseado no id
     * @param array $dados
     *  
     */
    public function edicao(array $dados){
        $categoria = $this->repository->obter($dados['id']);
        $this->render('painel', 'template/editar-categoria.php', [$categoria]);
    }

    /**
     * Manda os dados para atualizar o repositório
     * e lista as categorias posteriormente.
     * @param array $dados Dados incluindo Nome, Tipo e ID.
     * @return void
     */
    public function atualizar(array $dados){
        $categoria = new Categoria($dados['nome'], $dados['tipo']);
        $categoria->setId($dados['id']);

        $this->repository->atualizar($categoria);

        $this->listarCategorias();
    }

    public function remover(array $dados){
        $this->repository->remover($dados['id']);

        $this->listarCategorias();
    }

}