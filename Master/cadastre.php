<?php
require_once '../Classes/Util/Mensagem/Mensagem.class.php';
require_once '../Classes/Connection/Connection.class.php';
require_once '../Classes/Usuario/Usuario.class.php';
require_once '../Classes/Usuario/UsuarioDAO.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CADASTRAR_USUÁRIO</title>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="cadastre01">

            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="call.php">HelpDesk!</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav"> 
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="chamadosabertos.php">Chamados abertos</a>
                        </li>
                        <li class="dropdown">
                            <a href="registros.php">Registros</a>
                        </li>
                        <li class="dropdown">
                            <a href="listUser.php">Lista de usuários</a>
                        </li>
                        <li class="dropdown">
                            <a href="alterarUser.php">Alterar dados</a>
                        </li>
                        <li class="dropdown">
                            <a href="excluirconta.php">Excluir conta</a>
                        </li>
                        <li class="dropdown">
                            <a href="index.php">Sair</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div class="tgeral" id="t01cad"><br/>Cadastrar usuário</div><br/>

            <center>
            <form class="form-signin" role="form" action="register.php" method="post" autocomplete="off">
                <div class="form-group" id="inputcenter">
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required pattern="[a-z\sA-Z]+$" title="Preencha o campo com o nome!">
                </div>
                <div class="form-group" id="inputcenter">
                    <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome" name="sobrenome" required pattern="[a-z\sA-Z]+$" title="Preencha o campo com o sobrenome!">
                </div>
                <div class="form-group" id="inputcenter">
                    <input type="text" class="form-control" id="login" placeholder="Login" name="login" required>
                </div>
                <div class="form-group" id="inputcenter">
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
                </div>
                <div class="form-group" id="inputcenter">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div>
                <div class="form-group" id="inputcenter">
                    <select class="form-control" id="tipo "name="tipo" required>
                        <option value="Usuario">Usuario</option>
                        <option value="Administrador">Administrador</option>
                    </select>
                </div>
                <br/>
               
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Cadastrar</button>
                    <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat"></span> Limpar campos</button>
            </form>
            </center> 
            
    </body>

</html>
