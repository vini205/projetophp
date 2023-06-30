<?php
function verificaUrl($rota){
    $caminho = $_SERVER['REQUEST_URI'];
    /* if ($caminho == $rota) {
        return true;
    } */
    $rota = str_replace('/','\/', $rota);   // Arruma problema com \

    if (preg_match('/^'.$rota.'$/',$caminho)) {
        return true;
    }   
}


if(verificaUrl('/')){
    require __DIR__.'\site\routes.php';
} elseif (verificaUrl('/admin?(.*)')) {
  require __DIR__.'\admin\routes.php';  
} 
else {
    echo 'page not found';
    http_response_code(404);
}