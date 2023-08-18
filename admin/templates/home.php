<?php

use App\Model\Categoria;
use App\Model\Movimentacao;

$categoria = new Categoria('teste','ENTRADA',2,'1');
$movimentacoes = [new Movimentacao(10, $categoria, 'teste de movimentação'), new Movimentacao(12,$categoria, 'teste 2')];

$saldo =30;

$color = ($saldo < 0 ) ? 'color:red;': 'color:green;';


?>

<h3>Valor total da carteira:<span style="<?= $color ?>"> <?= $saldo ?> </span></h3>

<br>

<table class="table">
    <thead>
        <th scope="col">Categoria</th>
        <th scope="col">Tipo</th>
        <th scope="col">Prioridade</th>
        <th scope="col">Descrição</th>
        <th scope="col">Fixa/variável</th>
        <th scope="col">Data</th>
        <th scope="col">Valor</th>
    </thead>
    <tbody>
        <?php
        foreach ($movimentacoes as $movimentacao) {
            $categoria = $movimentacao->getAtribut('categoria');

            echo '<tr>';
            echo '<td>' . $categoria->getNome() . '</td>';
            echo '<td>' . App\TiposCategoria::toString($categoria->getTipo()) . '</td>';
            echo '<td>' . $movimentacao->getAtribut('prioridade') . '</td>';
            echo '<td>' . $movimentacao->getAtribut('descricao') . '</td>';
            echo '<td>' . App\TiposCategoria::toString('fixo') . '</td>';
            echo '<td>' . $movimentacao->getAtribut('data') . '</td>';
            echo '<td>' . $movimentacao->getAtribut('valor') . '</td>';
            echo '<tr>';
        }

        ?>
    </tbody>
</table>