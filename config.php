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



use App\Repository\categoriaRepository;
use App\Controller\CategoriaController;
use App\Rota;
use App\Router;
use App\Controller\PainelController;
use App\Controller\siteController;

$builder = require_once __DIR__.'/container.php';


$caminho = $_SERVER['REQUEST_URI'];
$router = new Router($caminho);
$controllerPainel = new PainelController();
$siteController = new siteController();
$categoriaController = $builder->get(CategoriaController::class);
//$categoriaController = new CategoriaController();

$dados = $_POST;// pegar dados vindos por post




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

$router->add(
    new Rota('/admin/categoria/listar',
    $categoriaController,
    'listarCAtegorias')
);

$router->add(
    new Rota(
        '/admin/categoria/cadastrar',
        $categoriaController,
        'cadastrar'
    )
    );

$router->add(
    new Rota(
        '/admin/categoria/novo',
        $categoriaController,
        'novo',
        $dados
    )
    );

$router->add(
    new Rota('/admin/categoria/{id}/edicao',//id é dinâmico
    $categoriaController,
    'edicao',
    $dados
    )
);

$router->add(
    new Rota('/admin/categoria/{id}/atualizar',
    $categoriaController,
    'atualizar',
    $dados
    )
);

$router->add(
    new Rota('/admin/categoria/{id}/remover',
    $categoriaController,
    'remover',
    $dados
    )
);

$router->handler();