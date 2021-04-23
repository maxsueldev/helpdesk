<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <title>NOVO_CHAMADO</title>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    </head>
	
	<body id="callUser">

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

    <div class="tgeral" id="t01call"><br/>Novo chamado</div><br/><br/><br/>
    
      <form class="form-signin" id="form01" role="form" action="chamadoOk.php" method="post" autocomplete="off">
              <div id="inputleft" style="float: left">
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="setor" name="setor" placeholder="Setor" required pattern="[a-z\sA-Z]+$" title="Apenas letras!">
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="ramal" name="ramal" placeholder="Ramal" pattern="[0-9]+$" title="Apenas números!">
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input class="form-control" list="relacionado" name="relacionado" placeholder="Relacionado a">
                      <datalist id="relacionado">
                        <option value="Internet">
                        <option value="Impressora">
                        <option value="Wi-fi">
                        <option value="Outros">
                    </datalist>
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="date" class="form-control" id="data" name="data" required>
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="time" class="form-control" id="hora" name="hora" required>
                </div>
              </div>
      
              <div id="inputright" style="float: right">
                <div class="form-group" id="inputcenter"> 
                    <textarea class="form-control" id="mensagem" name="mensagem" cols="11" rows="11" placeholder="Digite aqui o seu problema"></textarea>
                </div>
              </div>  

              <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <center><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Enviar</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat"></span> Limpar campos</button></center>
      </form>
    
	</body>

</html>