<h3>Movimentacao</h3>
<br>

<form action="/admin/movimentacao/novo" method="POST">
    <div class="mb-3" >
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class='form-control' id='descricao' name='descricao'> 
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label"> Valor</label>
        <input type="number" name="valor" id="valor" class="form-control ">
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label"> Categoria</label>
        <select id='categoris'name='categoria'>
            <?php
            
            foreach ($dados as $categoria) {
                $descricaoCategoria = $categoria->getNome(). ' - ' . App\TiposCategoria::toString($categoria->getTipo());
                echo "<option value='".$categoria->getAtribut('id'). " '.> $descricaoCategoria </option>";
                
            }

            ?>
        </select>    
    </div>
    <button type="submit" class="btn btn-primary" >Enviar</button>
</form>

