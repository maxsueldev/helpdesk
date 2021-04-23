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
        <meta http-equiv="refresh" content="5;URL='listUser.php'">

        <title>ALTERAR_USUÁRIO</title>

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

        <div class="tgeral" id="t01alt"><br/>Alterar usuário</div><br/><br/><br/>

        	<?php
			// Armazena os valores passados
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
			$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			
			$usuarioDAO = new UsuarioDAO();
			$vUsuarios = $usuarioDAO->selecionar($id, $nomePesquisa, $loginPesquisa, $emailPesquisa);
			
			if (count($vUsuarios) == 0) {
			?>
			<?=Mensagem::getMensagem("MESSAGE_INFO", "Nenhum usuario encontrado.");?>
			<?php
			} else {
				$usuario = $vUsuarios[0];
				$usuario->setNome($nome);
				$usuario->setSobrenome($sobrenome);
				$usuario->setLogin($login);
				$usuario->setSenha($senha);
				$usuario->setEmail($email);
			?>	
				<?=$usuarioDAO->atualizar($usuario);?>
			<?php
			}
			?>

		<br/><br/><br/>

        <div class="tgeral" id="direciona">
            Você sera direcionado para a lista de usuários em <div id="cronometro">5 segundos!</div>
        </div>

        <div class="copyright tgeral" id="cp"> 
              Copyright <?=date("Y")?> - Todos os direitos reservados
        </div>

	</body>

</html>