<?php

namespace App\Controller;

use App\Controller\Controller;

class PainelController extends Controller{
    public function listar()
    {
        header('location: /admin/movimentacao/listar');
    }
    public function logar()# o login e logout são páginas separadas
    {
        return require __DIR__.'/../../admin/login.php';
    }

    public function logout()
    {
        return require __DIR__. '/../../admin/logout.php';
    }
}