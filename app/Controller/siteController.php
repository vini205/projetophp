<?php

namespace App\Controller;

use App\Controller\Controller;

class siteController extends Controller{
        public function home(){
            echo 'nin';         
            return require __DIR__. '/../../site/home.php';
        }   
}