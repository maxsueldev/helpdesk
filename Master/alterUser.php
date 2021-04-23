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

        <title>ALTERAR_USUÁRIO</title>

        </head>

    <body id="callMaster">

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
                            <a href="cadastre.php">Cadastrar usuário</a>
                        </li>
                        <li class="dropdown">
                            <a href="exluirconta.php">Excluir conta</a>
                        </li>
                        <li class="dropdown">
                            <a href="index.php">Sair</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

        	<div class="tgeral" id="t01alt"><br/>Alterar usuário</div><br/>

        	<?php
			$usuarioDAO = new UsuarioDAO();		

            $id = filter_input(INPUT_GET, "c", FILTER_SANITIZE_NUMBER_INT); 
			
			$vUsuarios = $usuarioDAO->selecionar($id, $nome, $login, $email);
			
			if (count($vUsuarios) == 0) {
			?>
			<?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum usuario encontrado.");?>
			<?php
			} else {
				$usuario = $vUsuarios[0];
			?>
			
            <center>
            <form class="form-signin" role="form" action="changedUser.php" method="post" autocomplete="off">
                <div class="form-group" id="inputcenter">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Id" value="<?=$usuario->getId()?>">
                </div>
                <div class="form-group" id="inputcenter">
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?=$usuario->getNome()?>" pattern="[a-z\sA-Z]+$" title="Apenas letras!">
                </div> 
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?=$usuario->getSobrenome()?>" pattern="[a-z\sA-Z]+$" title="Apenas letras!">
                </div>
                <div class="form-group" id="inputcenter">
                    <input type="text" class="form-control" id="login" name="login" placeholder="Login" value="<?=$usuario->getLogin()?>">
                </div>
                <div class="form-group" id="inputcenter">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" value="<?=$usuario->getSenha()?>">
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$usuario->getEmail()?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
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
