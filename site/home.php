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
            #content{
                padding-top:50px;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <nav class="navbar navbar-light bg-primary">
                <div class="container-fluid">
                    <a href="#" class='navbar-brand text-light'>Minha carteira</a>
                </div>
            </nav>
        </div>
        <div id='main'>
            <div class="row justify-content-center">
            
                <div id="content" class='col-4 align-self-center'>
                    <div class="card">
                        <div class="card-body">
            
                            <h5 class='card-title'> Login </h5>
                            <form action='/admin/login' method='POST'>
                                <div class="mb-3">
                                    <label for="admin" class="form-label">Admin</label>
                                    <input type="text" class="form-control" name='admin' id="admin" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" class="form-control" name='senha' id="senha">
                                </div>

                                
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>