<?php 

namespace App\Repository;

use App\Model\Model;
use App\Repository\Repository;
use App\BancoDados;
use App\Model\Categoria;

class categoriaRepository implements Repository{
    private BancoDados $bancoDados;

    private string $table;

    public function __construct(BancoDados $bancoDados){
        $this->bancoDados = $bancoDados;
        $this->table = "categorias";
    }

    public function listar(){
        $sql = "SELECT * from $this->table where ativo = 1";
        $res = $this->bancoDados->consultar($sql);
        return $this->toObject($res);   
    }

    /**
     * salva uma categoria
     * @param \App\Model\Model $model o Model utilizado
     * @return void
     */
    public function salvar(Model $model){
        $sql = "INSERT INTO $this->table (nome, tipo,ativo,prioridade,fixo) ValUES (:nome,:tipo,1)";
        $params = [
            'nome' => $model->getAtribut('nome'),
            'tipo' => $model->getAtribut('tipo'),
            'prioridade' => $model->getAtribut('prioridade'),
            'fixo' => $model->getAtribut('fixo')
        ];
        $this->bancoDados->executar($sql,$params);
    }

    public function toObject(array $resultado){
        $categorias = [];
        foreach($resultado as $linha){
            $categoria = new Categoria($linha['nome'],$linha['categoria'], $linha['prioridade'], $linha['fixo']);
            $categoria->setId($linha['ID']);
            array_push($categorias, $categoria );
        }
        return $categorias;
    }

    /**
     * Atualiza o repositório, alterando dados únicos
     * pelo id. Recebe um Model como parametro, com as propriedades
     * do dado a ser atualizado
     * @param \App\Model\Model $model
     * @return void
     */
    public function atualizar(Model $model){
        $sql = "UPDATE $this->table SET nome = :nome, categoria= :tipo, prioridade=:prioridade,fixo=:fixo WHERE id = :id";
        $params=[
            'nome' => $model->getAtribut('nome'),
            'tipo' => $model->getAtribut('tipo'),
            'id' => $model->getAtribut('id'),
            'prioridade'=>$model->getAtribut('prioridade'),
            'fixo'=>$model->getAtribut('fixo')
        ];

        $this->bancoDados->executar($sql,$params);


    }

    /**
     * Remove um valor do repositório. Remove os itens pelo ID 
     * E ele não remove propriamente, mas o desativa
     * 
     * @param mixed $id Id do item
     * @return void
     */
    public function remover($id){
        $sql = "UPDATE $this->table SET ativo=0 WHERE id = :id";
        $this->bancoDados->executar($sql,['id'=> $id]);
    }

    public function obter(int $id){
        $sql = "SELECT * FROM $this->table WHERE ID = :id";
        $res = $this->toObject($this->bancoDados->consultar($sql, ['id' => $id]));
        return $res[0]; 
    }
}