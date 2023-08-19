<?php

namespace App\Repository;

use App\BancoDados;
use App\Exceptions\BancoDadosExeception;
use App\Model\Model;
use App\Model\Movimentacao;
use App\Repository\Repository;

class MovimentacaoRepository implements Repository{
    private BancoDados $banco;
    private categoriaRepository $categoriaRepository;
    private string $table;

    public function __construct(
        BancoDados $banco,
        categoriaRepository $repository
    ){
        $this->banco = $banco;
        $this->categoriaRepository = $repository;
        $this->table = 'movimentacoes';
    }

    public function criar(array $dados){
        $valor = $dados['valor'];

        try {
            $this->banco->iniciarTransacao(); 
            $categoria = $this->categoriaRepository->obter($dados['categoria']);
            $movimentacao = new Movimentacao($valor,$categoria,$dados['descricao']);
            $this->salvar($movimentacao);
            $this->banco->commit();

        } catch (BancoDadosExeception $exeception) {
            $this->banco->rollBack();
            die('Não foi possível realizar a movimentação');
        }
    }
    
     public function listar(){
        $sql = "SELECT * FROM $this->table order By data desc ";
        return $this->toObject($this->banco->consultar($sql));
     }
     public function salvar(Model $model){
        $sql = "INSERT INTO $this->table (idCategoria,descricao,valor,data) values
        (:idCategoria, :descricao, :valor, :data)";
        $params = [
            'idCategoria'=> $model->getAtribut('categoria')->getAtribut('id'),
            'descricao' => $model->getAtribut('descricao'),
            'valor' => $model->getAtribut('valor'),
            "data" => date('Y-m-d H:i:s')
        ];
        $this->banco->executar($sql,$params);
    }

    
    public function obter(int $id){

    }
    public function obterSaldo(){
        $sql = "SELECT sum(valor) FROM $this->table";
        return $this->banco->consultar($sql);
    }
    public function atualizar(Model $model){

    }
    public function remover(int $id){

    }
    
    public function toObject(array $resultado){
        $movimentacoes = [];
        foreach ($resultado as $linha) {
            $categoria = $this->categoriaRepository->obter($linha['idCategoria']);
            $movimentacao = new Movimentacao($linha['valor'],$categoria,$linha['descricao']);
            $movimentacao->setData($linha['data']);
            array_push($movimentacoes,$movimentacao);
        }
        return $movimentacoes;
    }
}