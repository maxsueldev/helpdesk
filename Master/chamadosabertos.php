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
     
        <title>REGISTROS</title>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">

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
                            <a href="registros.php">Registros</a>
                        </li>
                        <li class="dropdown">
                            <a href="listUser.php">Lista de usuários</a>
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

      <div class="tgeral" id="t01cad"><br/>Chamados abertos</div><br/>

      <center>
      <form class="form-signin" role="form" action="#list01" method="get" autocomplete="off">
                <div class="form-group" id="inputcenter"> 
                    <input type="text" class="form-control" id="setor" name="setor" placeholder="Setor" pattern="[a-z\sA-Z]+$" title="Apenas letras!">
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
                    <input type="date" class="form-control" id="data" name="data">
                </div> 
                <br/>

                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-repeat"></span> Limpar campos</button>
            </form>     
      </center>

      <br/><br/>

    </div>

    <div id="list01">

      <?php

      $chamadoDAO = new ChamadoDAO();   

      $setor = filter_input(INPUT_GET, "setor", FILTER_SANITIZE_STRING);
      $relacionado = filter_input(INPUT_GET, "relacionado", FILTER_SANITIZE_STRING);
      $data = filter_input(INPUT_GET, "data", FILTER_SANITIZE_STRING);
      
      $vChamados = $chamadoDAO->selecionarAberto($id, $setor, $relacionado, $data, $mensagem, $status);
      
      if (count($vChamados) == 0) {
      ?>
      <?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum chamado encontrado.");?>
      <?php
      } else {
      ?>

      <form class="form-signin" role="form" action="excluirChamado.php" method="post">
      <table class="table table-striped table-hover" id="tableList">
        <thead>
          <tr>
            <th class="col-xs-1 text-primary text-center"></th>
            <th class="text-primary">Setor</th>
            <th class="text-primary">Relacionado</th>
            <th class="text-primary">Data</th>
            <th class="text-primary">Mensagem</th>
            <th class="text-primary">Status</th>
            <th class="col-xs-1 text-primary text-center"></th>
            <th class="col-xs-1 text-primary text-center"></th>
          </tr>
        </thead>
        <tbody>     
      <?php
        foreach ($vChamados as $chamado) {
      ?>
          <tr>
            <td>
              <input type="checkbox" name="vIds[]" value="<?=$chamado->getId()?>">
            </td>
            <td>
              <?=$chamado->getSetor()?>
            </td>
            <td>
              <?=$chamado->getRelacionado()?>
            </td>
            <td>
              <?=date('d/m/Y', strtotime($chamado->getData()))?>
            </td>
            <td>
              <?=$chamado->getMensagem()?>
            </td>
            <td>
              <?=$chamado->getStatus()?>
            </td>
            <div id="btn-alter">
            <td><a href="atendido.php?c=<?= $chamado->getId() ?>" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> Atender</a></td>
            </div>
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