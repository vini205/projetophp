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
        $sql = "INSERT INTO $this->table (nome, categoria,ativo) ValUES (:nome,:tipo,1)";
        $params = [
            'nome' => $model->getAtribut('nome'),
            'tipo' => $model->getAtribut('tipo')
        ];
        $this->bancoDados->executar($sql,$params);
    }
    public function toObject(array $resultado){
        $categorias = [];
        foreach($resultado as $linha){
            $categoria = new Categoria($linha['nome'],$linha['categoria']);
            $categoria->setId($linha['ID']);
            array_push($categorias, $categoria );
        }
        return $categorias;
    }
}