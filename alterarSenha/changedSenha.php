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

        <title>ALTERAR_SENHA</title>

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
    
    <body class="forgot">

        <div class="tgeral" id="t01alt"><br/>Alterar senha</div><br/><br/><br/>

        	<?php
			// Armazena os valores passados
			$id = filter_input(INPUT_GET, "c", FILTER_SANITIZE_NUMBER_INT);
			$senha = filter_input(INPUT_POST, 'novasenha', FILTER_SANITIZE_STRING);

			$usuarioDAO = new UsuarioDAO();
			$vUsuarios = $usuarioDAO->alterarSenha($id, $senha);
			
			if (count($vUsuarios) == 0) {
			?>
			<?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum usuario encontrado.");?>
			<?php
			} else {
				$usuario = $vUsuarios[0];
				$usuario->setId($id);
				$usuario->setSenha($senha);
			?>	
				<?=$usuarioDAO->atualizar($usuario);?>
			<?php
			}
			?>

		<br/><br/><br/>

        <div class="tgeral" id="direciona">
            Você sera direcionado para a pagina inicial em <div id="cronometro">5 segundos!</div>
        </div>

	</body>

</html>
