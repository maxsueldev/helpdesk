<?php
//require_once '../Classes/Connection/Connection.class.php';
//require_once '../Classes/Util/Mensagem/Mensagem.class.php';
//require_once '../Classes/Usuario/Usuario.class.php';
//require_once '../Classes/Usuario/UsuarioDAO.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <title>HELPDESK!</title>
 
        <!--<script src="../js/jquery-2.1.1.js"></script>-->
        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/animate.min.css">
        <link rel="stylesheet" href="../css/animate.css">
        <script src="../js/wow.min.js"></script>

    </head>

  <script>
       wow = new WOW(
    {
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0          // default
    }
  )
  wow.init();
  </script>

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

    <body>

      <div class="main">

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
                        <li class="dropdown">
                            <a href="#about">Sobre</a>
                        </li>
                        <li class="dropdown">
                            <a href="#cadastre">Cadastrar</a>
                        </li>
                        <li class="dropdown">
                            <a href="#contactme">Desenvolvedor</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

              <div class="wow bounceIn tgeral" id="t01main"><br/>HelpDesk!</div>
              <div class="wow bounceInUp tgeral" id ="t02main">A sua solução em suporte de T.I</div><br/><br/><br/><br/><br/><br/><br/><br/>
              <center>
                <table>
                  <tr>
                    <td><img src="../image/computer.png" class="wow bounceInRight" data-wow-delay="0.7s" width="100" height="100"/></td>
                    <td><img src="../image/printer.png" class="wow bounceInRight" data-wow-delay="0.7s" width="100" height="100"/></td>
                    <td><img src="../image/wifi.png" class="wow bounceInRight" data-wow-delay="0.7s" width="70" height="60"/></td>
                    <td><img src="../image/usb.png" class="wow bounceInRight" data-wow-delay="0.7s" width="85" height="70"/></td>
                  </tr>
                </table>
              </center>

        </div>

        <div class="about" id="about">
          <table>
            <tr>
              <td><div class="wow bounceIn tgeral" id="t01about"><br/><br/><br/><br/><p>Temos problemas direto com toda tecnologia ao nosso alcance!</p><p>Com isso precisamos muitas vezes do suporte do setor de T.I</p><br/><br/><br/></div></td>
            </tr>
          </table>
          <div class="wow bounceIn tgeral" id="t02about"><br/><p>O HelpDesk! é um sistema gratuito onde você usuário, poderá solicitar um suporte a alguêm da T.I, </p>sem a nescessidade de usar o ramal da empresa. Apenas seu computador em rede e com mais facilidade!</div>
        </div>  
        
        <div class="cadastre" id="cadastre"> 
              <div class="wow bounceInUp tgeral" id="t01cadastre"><br/><br/><br/>Ainda não tem sua conta no HelpDesk!?</div>
              <div class="wow bounceInUp" id="t02cadastre"><a href="cadastre.php" id="a01">Clique aqui para se cadastrar</a></div>
        </div>

        <div class="contactme" id="contactme">
            <center>
                <table>
                  <tr>
                    <td><div class="wow pulse tgeral" data-wow-duration="1.7s" id ="t01contactme">Desenvolvedor: &nbsp;</div></td></br>
                    <td><a href="https://www.facebook.com/maxsuel.f94" target="_blank"><img src="../image/facebook.png" class="wow bounceIn" width="50" height="50"/></a></td>
                    <td><a href="https://twitter.com/_maxfernando94" target="_blank"><img src="../image/twitter.png" class="wow bounceIn" width="50" height="50"/></a></td>
                    <td><a href="https://plus.google.com/105883570906566299566/posts?hl=pt_br" target="_blank"><img src="../image/gplus.png" class="wow bounceIn" width="50" height="50"/></a></td>
                    <td><a href="mailto:maxsuelf94@gmail.com"><img src="../image/mail.png" class="wow bounceIn" width="50" height="50"/></a></td>
                  </tr>
                </table>
            </center>
        </div>

    <button type="button" id="btnVoltar" class="voltarTopo" onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 800);" value="Voltar ao topo"></button>
  
    </body>

</html>