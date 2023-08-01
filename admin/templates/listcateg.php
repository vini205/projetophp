<?php
    
?>

<h1>Listagem de categorias</h1>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($dados as $categorias) {
        
        echo '<tr>';
        echo '<th scope="row">'. $categorias->getAtribut('id').'</th>';

        echo '<td>'.$categorias->getNome().'</td>';
        echo '<td>'.$categorias->getTipo().'</td>';
        
        echo '</tr>';
    }

?>

      <!--   <tr>
            <th scope="row">1</th>
            <td>Alimentação</td>
            <td>Saída</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Educação</td>
            <td>Saída</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Salario</td>
            <td>Entrada</td>
        </tr> -->
    </tbody>
</table>
<a href="/admin/categoria/cadastrar" class='btn-secondary btn' >Cadastrar uma nova categoria</a>