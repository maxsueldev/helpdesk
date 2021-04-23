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
        <meta http-equiv="refresh" content="5;URL='chamadosabertos.php'">

        <title>ATENDIDO</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../js/jquery-2.1.1.min.js"></script>

    <script>
		var i = 5; // segundos
		function contagemRegressiva(){
			i--;
			document.getElementById('cronometro').innerHTML = i + ' segundos!';
		}
		setInterval("contagemRegressiva()", 1000);
	</script>

    </head>
    
    <body id="callMaster">

        <div class="tgeral" id="t01alt"><br/>Atendido</div><br/><br/><br/>

        	<?php
			$chamadoDAO = new ChamadoDAO();

			// Armazena os valores passados
			$id = filter_input(INPUT_GET, "c", FILTER_SANITIZE_NUMBER_INT); 			

			$vChamados = $chamadoDAO->selecionar($id, $setorDaPesquisa, $relacionadoDaPesquisa, $dataDaPesquisa);
			
			$status = "Concluido";

			if (count($vChamados) == 0) {
			?>
			<?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum chamado encontrado.");?>
			<?php
			} else {
				$chamado = $vChamados[0];
				$chamado->setId($id);
				$chamado->setStatus($status);
			?>	
				<?=$chamadoDAO->atualizar($chamado);?>
			<?php
			}
			?>

		<br/><br/><br/>

        <div class="tgeral" id="direciona">
            Você sera direcionado para os chamados abertos em <div id="cronometro">5 segundos!</div>
        </div>

	</body>

</html>