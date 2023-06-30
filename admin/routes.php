<?php

include  __DIR__.'/render.php';

if( verificaUrl('/admin') || verificaUrl('/admin/')){
    render('panel','templates/home.php' );  

} elseif (verificaUrl('/admin/categoria/cadastrar?(.*)')) {
    render('panel','templates/cadastro-categ.php');

}elseif (verificaUrl('/admin/categoria/list?([a-z]*)')){
    render('panel','templates/listcateg.php');

}
else{
    echo 'Página não encontrada';
    http_response_code(404);
}