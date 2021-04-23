<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
     
        <title>RECUPERAR_SENHA</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    </head>
    
    <body class="forgot">

            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">HelpDesk!</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav"> 
                        <li class="dropdown">
                            <form class="navbar-form navbar-left" role="form" method="post" action="autenticaAdmin.php" autocomplete="off">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Login" name="login" required>
                      <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                    </div>
                    <button class="btn btn-primary">Entrar <span class="glyphicon glyphicon-user"></span></button>
                  </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

        <div class="tgeral" id="t01cad"><br/>Recuperar senha</div><br/>

            <center>
            <form class="form-signin" role="form" action="recuperacao.php" method="post" autocomplete="off">
                <div class="form-group" id="inputcenter">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div>
                <br/>
               
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Recuperar</button>
                    <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat"></span> Limpar campo</button>
            </form>
            </center> 

    </body>
    
</html>