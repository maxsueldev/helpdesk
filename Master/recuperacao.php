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
        <meta http-equiv="refresh" content="5;URL='index.php'">
     
        <title>RECUPERAR_SENHA</title>
  
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
    </head>

    <script>
        var i = 5; // segundos
        function contagemRegressiva(){
            i--;
            document.getElementById('cronometro').innerHTML = i + ' segundos!';
        }
        setInterval("contagemRegressiva()", 1000);
    </script>

    <body class="forgot">

    	<div class="tgeral" id="t01cad"><br/>Recuperar senha</div><br/><br/><br/>

        <?php
            
        // Recebe os valores passados via formulário
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

        // Instanciar o objeto
        $usuario = new Usuario();
        $usuario->setEmail($email);

        $usuarioDAO = new UsuarioDAO();

        echo $usuarioDAO->recuperar($email);
       
        ?>

        <br/><br/><br/>

        <div class="tgeral" id="direciona">
            Você sera direcionado para a paginal inicial em <div id="cronometro">5 segundos!</div>
        </div>

        <div class="copyright tgeral" id="cp"> 
              Copyright <?=date("Y")?> - Todos os direitos reservados
        </div>

    </body>
    
</html>

            


