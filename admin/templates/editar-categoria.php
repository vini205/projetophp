<?php
use App\TiposCategoria;

$entrada = TiposCategoria::ENTRADA;
$saida = TiposCategoria::SAIDA;
$categoria = $dados[0];



?>

<h3>Categoria</h3>
<br>
 <form method='POST' action="/admin/categoria/<?= $categoria->getAtribut('id') ?>/atualizar">
    <div class="mb-3">
        <label for="nome" class='form-label' >Nome</label>
        <input type="text" name="nome" class='form-control' aria-describedby='name' id="name" value="<?=$categoria->getNome(); ?>">
    </div>
    <div class="mb-3">
        <label class='form-label' for="tipo">Tipo</label>
        <select class='form-select' name="tipo" id="tipo">
            <option value="<?= $entrada  ?>" <?php if($categoria->getTipo() == $entrada) echo "selected" ?>> <?=TiposCategoria::toString($entrada) ?>  </option>
            <option value="<?= $saida  ?>"  <?php if($categoria->getTipo() == $saida) echo "selected" ?>><?= TiposCategoria::toString($saida) ?></option>
        </select>
    </div>
    <div class='mb-3'>
        <label for="prioridade">Prioridade da categoria</label>
        <input type="number" class='form-control' min='1' max='5' value="<?=$categoria->getPrioridade()?>" step='1' name='prioridade' id='prioridade'>
        <p class='form-text'>Um número que varia de 1 a 5 </p>
    </div>
    
    <div class='mb-3'>
        <input type="checkbox" name="fixo" <?php if($categoria->getFixo()== '0'){echo 'checked';} ?> class='btn-check' id="fixo">
        <label for="fixo" class='btn btn-outline-primary'>É uma categoria fixa?</label>
    </div>
    <input type="hidden" value="<?= $categoria->getAtribut('id') ?>" name='id'>
    <button class='btn btn-primary' type='submit'>enviar</button>
</form>


<?php

    if (isset($_POST) && isset($_POST['name'])) {
        echo ' <p> Categoria <em>'.$_POST['name']. '</em> cadastrada </p>';
    }
?>