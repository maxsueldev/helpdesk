<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <title>EXCLUIR_CONTA</title>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">

    <script>
      function enviaForm(idBotao) {
        var form = document.forms[0];
        if(idBotao == 'sim'){
          form.action = "excluirUsuario.php";
        }
        if(idBotao == 'nao'){
          form.action = "call.php";
        }
        form.submit();
      }
    </script>
    
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
                            <a href="novochamado.php">Novo chamado</a>
                        </li>
                        <li class="dropdown">
                            <a href="alterarUser.php">Alterar dados</a>
                        </li>
                        <li class="dropdown">
                            <a href="index.php">Sair</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
    </nav>

    <div class="tgeral" id="t01cad"><br/><br/>Deseja excluir sua conta?</div><br/>

       <center><form>
          <button type="submit" class="btn btn-danger" name="sim" id="sim" onclick="javascript:enviaForm(this.id);"><span class="glyphicon glyphicon-ok"></span> SIM</button>
          <button type="submit" class="btn btn-success" name="nao" id="nao" onclick="javascript:enviaForm(this.id);"><span class="glyphicon glyphicon-remove"></span> NÃO</button>
      </form></center>
    
	</body>

</html>