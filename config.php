<?php
/* 
function verificaUrl($rota){
    $caminho = $_SERVER['REQUEST_URI'];
    
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
} */

use App\Rota;
use App\Router;
use App\Controller\PainelController;
use App\Controller\siteController;

$caminho = $_SERVER['REQUEST_URI'];
$router = new Router($caminho);
$controllerPainel = new PainelController();
$siteController = new siteController();


$router->add(
    new Rota('/admin',$controllerPainel,'listar')
);

$router->add(
    new Rota('/admin/login',$controllerPainel,'logar')
);

$router->add(
    new Rota('/admin/logout',$controllerPainel, 'logout')
);

$router->add(
    new Rota('/',
    $siteController,
    'home'
)
); 

$router->handler();