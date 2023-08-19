<?php 

namespace App\Controller;

use App\Controller\Controller;
use App\Repository\categoriaRepository;
use App\Repository\MovimentacaoRepository;

class MovimentacaoController extends Controller
{
    private MovimentacaoRepository $repository;
    private CategoriaRepository $categoriaRepository;

    public function __construct(MovimentacaoRepository $repository, CategoriaRepository $categoriaRepository)
    {
        $this->repository = $repository;
        $this->categoriaRepository = $categoriaRepository;
    }
    /**
     * Cria uma rota para a página de cadastrar categorias
     * @return void
     */
    public function cadastrar(){
        $categorias = $this->categoriaRepository->listar();
        $this->render('panel','templates/cadastrar-movimentacao.php',$categorias);
    }

    public function novo(array $dados){
        $this->repository->criar($dados);
        $this->listar();
    }
    public function listar(){
        $dados = [];

        $saldo = $this->repository->obterSaldo();
        $dados['saldo'] = $saldo[0]['sum(valor)'];

        $movimentacoes = $this->repository->listar();
        $dados['movimentacoes'] = $movimentacoes;
        $this->render('panel', 'templates/home.php',$dados);
    }
}