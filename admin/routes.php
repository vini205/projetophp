 <?php

include  __DIR__.'/render.php';

if( verificaUrl('/admin') || verificaUrl('/admin/')){
    render('panel','templates/home.php' );  

} elseif (verificaUrl('/admin/categoria/cadastrar?(.*)')) {
    render('panel','templates/cadastro-categ.php');

}elseif (verificaUrl('/admin/categoria/list?([a-z]*)')){
    render('panel','templates/listcateg.php');

}elseif (verificaUrl('/admin/login?(.*)')) {
    require __DIR__ .'/login.php';
    
} elseif (verificaUrl('/admin/logout?(.*)')) {
    require __DIR__ .'/logout.php';
}
else{
    echo 'Página não encontrada';
    http_response_code(404);
} 