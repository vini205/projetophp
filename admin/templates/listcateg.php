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
            <th scope='col'>Editar </th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($dados as $categorias) {
        $id =  $categorias->getAtribut('id');
        $linkEditar = "<a href='/admin/categoria/$id/edicao' class='btn btn-secondary'>Editar</a>";   
        $linkRemover = "<a href='/admin/categoria/$id/remover' class='btn btn-secondary'>Remover</a>";   
        echo '<tr>';
        echo '<th scope="row">'.$id.'</th>';

        echo '<td>'.$categorias->getNome().'</td>';
        echo '<td>'.App\TiposCategoria::toString($categorias->getTipo()).'</td>';
        echo "<td style='width:5px;'> $linkEditar </td>"; 
        echo "<td style='width:5px;'> $linkRemover </td>"; 
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