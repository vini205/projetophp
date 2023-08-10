<?php
namespace App;


class TiposCategoria
{
    const ENTRADA = 'ENTRADA';
    const SAIDA = 'SAIDA';

    const FIXA = '1';
    const VARIAVEL = '0';

    public static function toString($tipo){
        switch ($tipo) {
            case self::ENTRADA :
                return 'Entrada';
            
            case self::SAIDA:
                return 'Saida';
               
            case self::FIXA :
                return 'Fixa';
            case self::VARIAVEL:
                return 'Variável';
            default:
                return $tipo;
        }
    }
}