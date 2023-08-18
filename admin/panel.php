<?php 
    session_start();
    if (!(isset($_SESSION['autenticado']) && $_SESSION['autenticado'])) {
        http_response_code(403);
        header('location: /');
    }
    $urlAtual = $_SERVER['REQUEST_URI'];
    $categoriaAtiva = false;
    if(strpos($urlAtual, 'categoria') > 1){
        $categoriaAtiva = true;
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administração</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            html.body{
                height:100%;
            }
            #header{
                width:100%;
            }
            #main{
                flex:1;
            }
            #content{
                padding-top:20px;
            }
            #menu{
                height:100%;
                padding-top:20px;
            }
            #menu .nav-link.active{
                color:#fff;
                background-color:#0D6EFD;
            }
            td,th {
               text-align: center;
            }           
        </style>
    </head>
    <body>
        
        <div id="header">

            <nav class="navbar navbar-light bg-primary">
                <div class="container-fluid">
                    <a href="#" class='navbar-brand text-light'>Minha carteira</a>
                    <a href="/admin/logout" class=" btn text-light">Sair</a>
                </div>
            </nav>
        </div>

        <div class="container center" id='main'>
            <div class="row">
                <div class="col">
                    <ul class="nav flex-column" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if(!$categoriaAtiva) echo 'active';?>"   >Movimentação   </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/categoria/listar" class="nav-link <?php if($categoriaAtiva) echo 'active'; ?>" aria-current="page" >Categoria </a>
                        </li>
                    </ul>
                </div>

                <div class="col-10" id="content" >
                    <?php include __DIR__ . '/' . $conteudo; ?>
                </div>
            </div>
        </div>


         


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>