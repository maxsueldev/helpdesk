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

        <title>LISTA_DE_USUÁRIOS</title>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="../stylesheet" href="../css/animate.min.css">
        <link rel="../stylesheet" href="../css/animate.css">
        <script src="../js/wow.min.js"></script>

    <script type="text/javascript">
      var $j = jQuery.noConflict();
      $j(document).ready(function() {
        $j(".voltarTopo").hide();
        $j(function () {
          $j(window).scroll(function () {
            if ($j(this).scrollTop() > 100) {
              $j('.voltarTopo').fadeIn();
            } else {
              $j('.voltarTopo').fadeOut();
              }
          });
          $j('.voltarTopo').click(function() {
            $j('body,html').animate({scrollTop:0},600);
          }); 
        });
      });
    </script>

    </head>
	
	<body>

		<div class="list">

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
                            <a href="cadastre.php">Cadastrar usuário</a>
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

			<div class="tgeral" id="t01cad"><br/>Lista de usuários</div><br/>

			<center>
			<form class="form-signin" role="form" action="#list01" method="get" autocomplete="off">
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" pattern="[a-z\sA-Z]+$" title="Preencha o campo com o seu nome!">
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="login" name="login" placeholder="Login">
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div> <br/>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat"></span> Limpar campos</button>
            </form>			
			</center>

			<br/><br/>

		</div>

		<div id="list01">

			<?php

			$usuarioDAO = new UsuarioDAO();		

			$nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);
			$login = filter_input(INPUT_GET, "login", FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_EMAIL);
			$tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);
			
			$vUsuarios = $usuarioDAO->selecionar($id, $nome, $login, $email, $tipo);
			
			if (count($vUsuarios) == 0) {
			?>
			<?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum usuario encontrado.");?>
			<?php
			} else {
			?>

            <form class="form-signin" role="form" action="excluirUser.php" method="post">
			<table class="table table-striped table-hover" id="tableList">
				<thead>
					<tr>
                        <th class="col-xs-1 text-primary text-center"></th>
						<th class="text-primary">Tipo</th>
						<th class="text-primary">Nome</th>
						<th class="text-primary">Login</th>
					    <th class="text-primary">Email</th>
						<th class="col-xs-1 text-primary text-center"></th>
						<th class="col-xs-1 text-primary text-center"></th>
					</tr>
				</thead>
				<tbody>			
			<?php
				foreach ($vUsuarios as $usuario) {
			?>
					<tr>
                        <td>
                            <input type="checkbox" name="vIds[]" value="<?=$usuario->getId()?>">
                        </td>
						<td>
							<?=$usuario->getTipo()?>
						</td>
						<td>
							<?=$usuario->getNome()?>
						</td>
						<td>
							<?=$usuario->getLogin()?><br>
						</td>
						<td>
							<?=$usuario->getEmail()?><br>
						</td>
						<td><a href="alterUser.php?c=<?= $usuario->getId() ?>" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> Editar</a></td>
					</tr>
			<?php
				}
			?>
				</tbody>
			</table>
               <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Excluir </button>
            </form>

			<?php
			}
			?>

		</div>

		<button type="button" id="btnVoltar" class="voltarTopo" onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 800);" value="Voltar ao topo"></button>

    </body>

</html>