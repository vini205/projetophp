<?php
use App\BancoDados;

$dsn = 'mysql:host=localhost;dbname=projetophp';
$user = 'root';
$senha = '';
$pdo = new PDO($dsn, $user, $senha);// instanciar a classe fora da classe evita dependência



$builder = new DI\ContainerBuilder();
/* Ele ajudar a criar injeções diretas no construtor da class
sem que se precise dar new manualmente, mas preciso primeiro 
usar o builder.
*/

$builder->addDefinitions([
    BancoDados::class => \Di\create(BancoDados::class)->constructor($pdo)
]);
// $banco = new BancoDados($pdo); não é mais necessário
return $builder->build();