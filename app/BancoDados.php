<?php

namespace App;

use PDO; # Classe do  php para banco de dados em POO
use App\Exceptions\BancoDadosExeception;

class BancoDados 
{
    private PDO $conexao;

    public function __construct(PDO $pdo){
        $this->conexao = $pdo;
    }

    /**
     * Executa com segurança uma consulta SQL
     * @param string $sql O modelo SQL
     * @param array $params Os parametros
     * @return \PDOStatement|bool
     */
    public function executar(string $sql, array $params = []){
        try {
            $statement = $this->conexao->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (\PDOException $err) {
            throw new BancoDadosException("Houve um erro");
            
        }
       
    }

    public function consultar(string $sql, array $params = []){
        try {
            $res = $this->executar($sql,$params);
            return $res->fetchAll(PDO::FETCH_ASSOC); # retorna uma array com os elementos associados
        } catch (\PDOException $err) {
            throw new BancoDadosException("Houve um erro");    
        }
    }

    public function iniciarTransacao(){
        $this->conexao->beginTransaction();
    }
    /* é para ter controle da transação, vc inicia a transação e 
    dps commita, mas caso der algo errado, pode se dar o Rollback, voltar atrás.
    */
    public function commit()
    {
        $this->conexao->commit();
    }

    public function rollBack(){
        $this->conexao->rollBack();
    }

}