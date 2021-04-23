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
     
        <title>AUTENTICANDO_USUÁRIO</title>
  
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
	
	<body id="callMaster">

            <div class="tgeral" id="t01cad"><br/>Autenticando usuário</div><br/><br/><br/>

            <?php
            
            // Recebe os valores passados via formulário
            $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);
            $tipo = "Administrador";

            // Instanciar o objeto
            $usuario = new Usuario();
            $usuario->setLogin($login);
            $usuario->setSenha($senha);
            $usuario->setTipo($tipo);
            
                        $usuarioDAO = new UsuarioDAO();
                                             
                        $usuarioDAO->autenticarAdmin($login, $senha, $tipo);                        
            ?>

	</body>
    
</html>