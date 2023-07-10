<?php
echo 'login <br>';

session_start();//tudo que fizermos usando sessão devemos usar essa aqui, inseir, remover etc

const ADMIN = 'admin';
const SENHA = '123';
$tentativas = 1;

if( isset($_COOKIE) && isset($_COOKIE['tentativas'])){
    $tentativas = $_COOKIE['tentativas'];
    $tentativas++;
}
setcookie('tentativas',$tentativas,time()+60*60);

if(isset($_POST) && isset($_POST['admin']) && $_POST['senha'] == SENHA && $_POST['admin'] == ADMIN)  {
    echo $_POST['admin'];
    $_SESSION['autenticado'] = true;
    header('location: /admin');
} else{
    echo 'Error';
    var_dump($_POST);
    header('location: /');

}

