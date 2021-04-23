<?php
require_once '../Classes/Util/Mensagem/Mensagem.class.php';
require_once '../Classes/Connection/Connection.class.php';
require_once '../Classes/Usuario/Chamado.class.php';
require_once '../Classes/Usuario/ChamadoDAO.class.php';

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

        <title>ALTERAR_CHAMADO</title>

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
                            <a href="excluirconta.php">Excluir conta</a>
                        </li>
                        <li class="dropdown">
                            <a href="index.php">Sair</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

        	<div class="tgeral" id="t01alt">Alterar chamado</div><br/>

        	<?php
            
			$chamadoDAO = new ChamadoDAO();		

            $id = filter_input(INPUT_GET, "c", FILTER_SANITIZE_NUMBER_INT); 
			
			$vChamados = $chamadoDAO->selecionar($id, $setor, $relacionado, $data, $hora, $status);
			
			if (count($vChamados) == 0) {
			?>
			<?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum chamado encontrado.");?>
			<?php
			} else {
				$chamado = $vChamados[0];
			?>
			
            <center>
            <form class="form-signin" role="form" action="changedChamado.php" method="post" autocomplete="off">
                <div class="form-group" id="inputcenter">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Id" value="<?=$chamado->getId()?>">
                </div>
                <div class="form-group" id="inputcenter">
					<input type="text" class="form-control" id="setor" name="setor" placeholder="Setor" value="<?=$chamado->getSetor()?>" pattern="[a-z\sA-Z]+$" title="Apenas letras!">
                </div> 
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="ramal" name="ramal" placeholder="Ramal" value="<?=$chamado->getRamal()?>" pattern="[0-9]+$" title="Apenas números!">
                </div>
                <div class="form-group" id="inputcenter">
                    <input class="form-control" list="relacionado" name="relacionado" placeholder="Relacionado a" value="<?=$chamado->getRelacionado()?>">
                      <datalist id="relacionado">
                        <option value="Internet">
                        <option value="Impressora">
                        <option value="Wi-fi">
                        <option value="Outros">
                      </datalist>
                </div>
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="date" class="form-control" id="data" name="data" value="<?=$chamado->getData()?>">
                </div>
                <div class="form-group" id="inputcenter"> 
                    <input type="time" class="form-control" id="hora" name="hora" value="<?=$chamado->getHora()?>">
                </div>
              </div>  
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="mensagem" name="mensagem" placeholder="Digite aqui o problema" value="<?=$chamado->getMensagem()?>">
                </div>

                <div class="form-group" id="inputcenter"> 
                    <input class="form-control" list="status" name="status" placeholder="Status" value="<?=$chamado->getStatus()?>">
                      <datalist id="status">
                        <option value="Aberto">
                        <option value="Concluido">
                      </datalist>
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
