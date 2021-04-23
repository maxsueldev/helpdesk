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
        <meta http-equiv="refresh" content="5;URL='call.php'">

        <title>EXCLUSÃO</title>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="../stylesheet" href="../css/animate.min.css">
        <link rel="../stylesheet" href="../css/animate.css">
        <script src="../js/wow.min.js"></script>
    
    </head>

    <script>
        var i = 5; // segundos
        function contagemRegressiva(){
            i--;
            document.getElementById('cronometro').innerHTML = i + ' segundos!';
        }
        setInterval("contagemRegressiva()", 1000);
    </script>
    
    <body id="callMaster">

            <div class="wow bounceIn tgeral" id="t01main"><br/>Exclusão</div><br/><br/>

            <?php
            $chamadoDAO = new ChamadoDAO();
            $vIds = $_POST["vIds"];
            ?>
            <?= $chamadoDAO->remover($vIds) ?>

        <div class="tgeral" id="direciona">
            Você sera direcionado para a paginal inicial em <div id="cronometro">5 segundos!</div>
        </div>

    </body>

</html>