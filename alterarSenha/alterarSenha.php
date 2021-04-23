<?php
require_once '../Classes/Util/Mensagem/Mensagem.class.php';
require_once '../Classes/Connection/Connection.class.php';
require_once '../Classes/Usuario/Usuario.class.php';
require_once '../Classes/Usuario/UsuarioDAO.class.php';

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <title>ALTERAR_SENHA</title>

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
              <a class="navbar-brand" href="../User/index.php">HelpDesk!</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav"> 
                <li class="dropdown">
                  <form class="navbar-form navbar-left" role="form" method="post" action="autentica.php" autocomplete="off">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Login" name="login" required>
                      <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                    </div>
                      <button class="btn btn-primary">Entrar <span class="glyphicon glyphicon-user"></span></button>
                  </form>
                </li>
                <li class="dropdown">
                  <a class="navbar-brand tgeral" id="forgot" href="forgot.php">Esqueceu sua senha?</a>
                </li>                  
            </ul>
              <ul class="nav navbar-nav navbar-right">

              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>

      <div class="tgeral" id="t01alt"><br/>Alterar senha</div><br/>

      <?php
			     
        $usuarioDAO = new UsuarioDAO();		

        $id = filter_input(INPUT_GET, "c", FILTER_SANITIZE_NUMBER_INT);

        $vUsuarios = $usuarioDAO->alterarSenha($id, $senha); 

        if (count($vUsuarios) == 0) {
      ?>
          <?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum usuario encontrado.");?>
          <?php
        } else {
           $usuario = $vUsuarios[0];
          ?>

      <center>
        <form class="form-signin" role="form" action="changedSenha.php?c=<?= $usuario->getId() ?>" method="post" autocomplete="off">
        <div class="form-group" id="inputcenter">
          <input type="hidden" class="form-control" id="id" name="id" placeholder="Id" value="<?=$usuario->getId()?>">
        </div>
        <div class="form-group" id="inputcenter">
          <input type="text" class="form-control" id="senha" name="senha" placeholder="Senha antiga" readonly="readonly" value="Senha antiga : <?=$usuario->getSenha()?>">
        </div>
        <div class="form-group" id="inputcenter">
          <input type="password" class="form-control" id="novasenha" name="novasenha" placeholder="Nova senha">
        </div>

        <br/>

        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Gravar</button>
        <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat"></span> Limpar campos</button>
        </form>
      </center>

      <?php
        }
      ?>

    </body>

</html>