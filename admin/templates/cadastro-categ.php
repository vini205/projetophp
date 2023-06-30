<h3>Cadastrar categoria</h3>

<form method='get'>
    <div class="mb-3">
        <label for="name" class='form-label' >Nome</label>
        <input type="text" name="name" class='form-control' aria-describedby='name' id="name">
    </div>
    <div class="mb-3">
        <label class='form-label' for="tipo">Tipo</label>
        <input type="text" class='form-control' name="tipo" id="tipo">
    </div>
    <div class='mb-3'>
        <label for="prioridade">Prioridade da categoria</label>
        <input type="number" class='form-control' min='1' max='5' step='1' name='prioridade' id='prioridade'>
        <p class='form-text'>Um número que varia de 1 a 5 </p>
    </div>
    <div class='mb-3'>
        <input type="checkbox" name="fixa" class='btn-check' id="fixa">
        <label for="fixa" class='btn btn-outline-primary'>É uma categoria fixa?</label>
    </div>
    <button class='btn btn-primary' type='submit'>enviar</button>
</form>

<?php
    if (isset($_POST) && isset($_POST['name'])) {
        echo ' <p> Categoria <em>'.$_POST['name']. '</em> cadastrada </p>';
    }
?>