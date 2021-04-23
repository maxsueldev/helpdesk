<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <title>FRONTPAGE</title>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="../stylesheet" href="../css/animate.min.css">
        <link rel="../stylesheet" href="../css/animate.css">
        <script src="../js/wow.min.js"></script>

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
                        <li class="dropdown">
                            <a class="navbar-brand tgeral" id="forgot" href="forgot.php">Esqueceu sua senha?</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

              <div class="wow bounceIn tgeral" id="t01main"><br/>HelpDesk!</div>
              <div class="wow bounceInUp tgeral" id ="t02main">FrontPage</div><br/><br/><br/><br/><br/><br/><br/><br/>
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
              
    </body>

</html>