<?php

namespace App;

use PDO; # Classe do  php para banco de dados em POO

class BancoDados 
{
    private PDO $conexao;

    public function __construct(PDO $pdo){
        $this->conexao = $pdo;
    }

    public function executar(string $sql, array $params = []){
        $statement = $this->conexao->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    public function consultar(string $sql, array $params = []){
        $res = $this->executar($sql,$params);
        return $res->fetchAll(PDO::FETCH_ASSOC); # retorna uma array com os elementos associados
    }

}