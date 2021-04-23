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
     
        <title>NOVO_CHAMADO</title>
  
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
	
	<body id="callUser">

            <div class="tgeral" id="t01cad"><br/>Novo chamado</div><br/><br/><br/>

            <?php
            
            // Recebe os valores passados via formulário
            $setor = filter_input(INPUT_POST, "setor", FILTER_SANITIZE_STRING);
            $ramal = filter_input(INPUT_POST, "ramal", FILTER_SANITIZE_STRING);
            $relacionado = filter_input(INPUT_POST, "relacionado", FILTER_SANITIZE_STRING);
            $data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_STRING);
            $hora = filter_input(INPUT_POST, "hora", FILTER_SANITIZE_STRING);
            $mensagem = filter_input(INPUT_POST, "mensagem", FILTER_SANITIZE_STRING);
            
            $status = "Aberto";

            // Instanciar o objeto
            $chamado = new Chamado();
            $chamado->setSetor($setor);
            $chamado->setRamal($ramal);
            $chamado->setRelacionado($relacionado);
            $chamado->setData($data);
            $chamado->setHora($hora);
            $chamado->setMensagem($mensagem);
            $chamado->setStatus($status);
                        
                        $chamadoDAO = new ChamadoDAO();
                                             
                        $chamadoDAO->inserir($chamado);                        
            ?>

            <br/><br/><br/>

        <div class="tgeral" id="direciona">
            Você sera direcionado para a paginal inicial em <div id="cronometro">5 segundos!</div>
        </div>

	</body>
    
</html>