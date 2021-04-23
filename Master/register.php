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
        <meta http-equiv="refresh" content="5;URL='call.php'">
     
        <title>CADASTRO</title>
  
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
	
	<body class="cadastre">

            <div class="tgeral" id="t01cad"><br/>Cadastro</div><br/><br/><br/>

            <?php
            
            // Recebe os valores passados via formulário
            $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
            $sobrenome = filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
            $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_STRING);
            
            // Instanciar o objeto
            $usuario = new Usuario();
            $usuario->setNome($nome);
            $usuario->setSobrenome($sobrenome);
            $usuario->setLogin($login);
            $usuario->setSenha($senha);
            $usuario->setEmail($email);
            $usuario->setTipo($tipo);
                        
                        $usuarioDAO = new UsuarioDAO();
                                             
                        print $usuarioDAO->inserir($usuario);                        
            ?>

            <br/><br/><br/>

        <div class="tgeral" id="direciona">
            Você sera direcionado para a paginal inicial em <div id="cronometro">5 segundos!</div>
        </div>

	</body>
    
</html>