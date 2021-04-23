<?php

class UsuarioDAO{

	private $conexao;

	public function __construct() {
        $this->conexao = Connection::getConnection();
    }

	//FUNCÕES...

    public function selecionar($id, $nome, $login, $email) {

        $sql = "SELECT id, nome, sobrenome, login, senha, email, tipo FROM usuario WHERE id > 0";

        if (!empty($id)) {
            $sql .= " AND id = ?";
            $dados[] = $id;
        }

        if (!empty($nome)) {
            $sql .= " AND nome LIKE ?";
            $dados[] = $nome."%";
        }

        if (!empty($login)) {
            $sql .= " AND login LIKE ?";
            $dados[] = $login."%";
        }

        if (!empty($email)) {
            $sql .= " AND email LIKE ?";
            $dados[] = $email."%";
        }

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($dados);

        $result = $stmt->fetchAll();

        if (count($result)) {
            foreach ($result as $row) {
                $usuario = new Usuario();
                $usuario->setId($row["id"]);
                $usuario->setNome($row["nome"]);
                $usuario->setSobrenome($row["sobrenome"]);
                $usuario->setLogin($row["login"]);
                $usuario->setSenha($row["senha"]);
                $usuario->setEmail($row["email"]);
                $usuario->setTipo($row["tipo"]);

                $vUsuarios[] = $usuario;
            }
        }

        return $vUsuarios;
    }

    
    public function inserir($usuario) {
        if ($this->existe($usuario)) {
            return Mensagem::getMensagem("MESSAGE_INFO", "O Usuario informado j&aacute; est&aacute; cadastrado.");
        } else {
            // Prepara a Query
            $sql = "INSERT INTO usuario (nome, sobrenome, login, senha, email, tipo) VALUES  (?, ?, ? , ?, ?, ?)";

            $dados = array($usuario->getNome(), $usuario->getSobrenome(), $usuario->getLogin(), $usuario->getSenha(), $usuario->getEmail(), $usuario->getTipo());

            // Preparação da DML
            $stmt = $this->conexao->prepare($sql);

            // Executa a query
            $stmt->execute($dados);

            //require_once '../phpmailer/class.phpmailer.php';
            require_once '../phpmailer/PHPMailerAutoload.php';

            $mail = new PHPMailer();

            $mail->IsSMTP(); // Define que a mensagem será SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup server
            $mail->Port = 587;
            $mail->SMTPAuth = true;            // Enable SMTP authentication
            $mail->Username = 'maxsuelf94@gmail.com';        // SMTP username
            $mail->Password = 'maxsueledivkagab';      // SMTP password
            $mail->SMTPSecure = 'tls';      // tls or ssl connection as req

            $mail->From = "maxsuelf94@gmail.com"; // Seu e-mail
            $mail->FromName = "Maxsuel"; // Seu nome

            // Define o(s) destinatário(s)  
            $destinatario = $usuario->getEmail();
            $mail->AddAddress("$destinatario");

            // Define os dados técnicos da Mensagem
            $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
 
            // Define a mensagem (Texto e Assunto)
            $mail->Subject  = "HelpDesk!";
            $mail->Body = "Usuario cadastrado!<br/><br/><br/><br/>
            Você foi cadastrado no HelpDesk!<br/>
            <br/><br/><br/> <a href='localhost/SuporteTI/User/index.php'>Clique aqui para acessar o nosso sistema</a>";

            // Define os anexos (opcional)
            //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

            // Envia o e-mail
            $enviado = $mail->Send();

            // Limpa os destinatários e os anexos
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();
 
             // Exibe uma mensagem de resultado
            if ($enviado) {
                echo "Usuario cadastrado com sucesso!";
                return Mensagem::getMensagem("MESSAGE_SUCCESS", "Um email foi enviado com a confirmacao do cadastro. Verifique seu email.");
            } else {
            echo "Não foi possível enviar o e-mail.<br /><br />";
            echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
            }

            if ($stmt)
                return Mensagem::getMensagem("MESSAGE_SUCCESS", "Usu&aacute;rio cadastrado com sucesso.");
            else
                return Mensagem::getMensagem("MESSAGE_ERROR", "Problemas na inclus&atilde;o. Por favor tente novamente.<br> ERRO [" . $this->conexao->ErrorMsg() . "]");
        } // if ($this->existe($s)) {
    }

    public function atualizar($usuario) {
        if ($this->existe($usuario)) {
            return Mensagem::getMensagem("MESSAGE_INFO", "O Usuario informado j&aacute; est&aacute; cadastrado. Nenhuma Altera&ccedil;&atilde;o realizada");
        } else {
            // Prepara a Query
            $sql = "UPDATE usuario SET nome = ?, sobrenome = ?, login = ?, senha = ?, email = ? WHERE id = ?";

            $dados = array($usuario->getNome(), $usuario->getSobrenome(), $usuario->getLogin(), $usuario->getSenha(), $usuario->getEmail(), $usuario->getId());

            // Preparação da DML
            $stmt = $this->conexao->prepare($sql);

            // Executa a query
            $stmt->execute($dados);

            if ($stmt)
                return Mensagem::getMensagem("MESSAGE_SUCCESS", "Altera&ccedil;&atilde;o realizada com sucesso.");
            else
                return Mensagem::getMensagem("MESSAGE_ERROR", "Problemas na altera&ccedil;&atilde;o. Por favor tente novamente.<br> ERRO [" . $stmt->errorInfo() . "]");
        } // if ($this->existe($s)) {
    }

    public function recuperar($email) {

        $sql = "SELECT * FROM usuario WHERE email = '$email'";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($dados);

        $result = $stmt->fetchAll();

        if (count($result)) {

            foreach ($result as $row) {
                $usuario = new Usuario();
                $usuario->setId($row["id"]);
                $usuario->setNome($row["nome"]);
                $usuario->setSobrenome($row["sobrenome"]);
                $usuario->setLogin($row["login"]);
                $usuario->setSenha($row["senha"]);
                $usuario->setEmail($row["email"]);
                $usuario->setTipo($row["tipo"]);

                $vUsuarios[] = $usuario;

                //require_once '../phpmailer/class.phpmailer.php';
                require_once '../phpmailer/PHPMailerAutoload.php';

                $mail = new PHPMailer();

                $mail->IsSMTP(); // Define que a mensagem será SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup server
                $mail->Port = 587;
                $mail->SMTPAuth = true;            // Enable SMTP authentication
                $mail->Username = 'maxsuelf94@gmail.com';        // SMTP username
                $mail->Password = 'maxsueledivkagab';      // SMTP password
                $mail->SMTPSecure = 'tls';      // tls or ssl connection as req

                $mail->From = "maxsuelf94@gmail.com"; // Seu e-mail
                $mail->FromName = "Maxsuel"; // Seu nome

                // Define o(s) destinatário(s)  
                $destinatario = $usuario->getEmail();
                $mail->AddAddress("$destinatario");

                // Define os dados técnicos da Mensagem
                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML

                $id = $usuario->getId();
                $nome = $usuario->getNome();
                $login = $usuario->getLogin();
                $senha = $usuario->getSenha();

                // Define a mensagem (Texto e Assunto)
                $mail->Subject  = "HelpDesk!";
                $mail->Body = "Recuperar senha!<br/><br/><br/><br/>
                Nome : $nome<br/>
                Login : $login<br/>
                Senha : $senha<br/>
                <br/><br/><br/> <a href='localhost/SuporteTI/alterarSenha/alterarSenha.php?c=$id'>Clique aqui para alterar sua senha</a>";

                // Define os anexos (opcional)
                //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

                // Envia o e-mail
                $enviado = $mail->Send();

                // Limpa os destinatários e os anexos
                $mail->ClearAllRecipients();
                $mail->ClearAttachments();
 
                // Exibe uma mensagem de resultado
                if ($enviado) {
                    echo "E-mail enviado com sucesso!";
                    return Mensagem::getMensagem("MESSAGE_SUCCESS", "Um email foi enviado para recuperacao de senha. Verifique seu email.");
                } else {
                echo "Não foi possível enviar o e-mail.<br /><br />";
                echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
                }
        
            }
        }

        else{
        
        return Mensagem::getMensagem("MESSAGE_ERROR", "Esse email nao esta cadastrado no sistema.");
        
        }

        return $vUsuarios;
    }

    public function alterarSenha($id, $senha){

        $sql = "SELECT * FROM usuario WHERE id = '$id'";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($dados);

        $result = $stmt->fetchAll();

        if (count($result)) {

            foreach ($result as $row) {
                $usuario = new Usuario();
                $usuario->setId($row["id"]);
                $usuario->setNome($row["nome"]);
                $usuario->setSobrenome($row["sobrenome"]);
                $usuario->setLogin($row["login"]);
                $usuario->setSenha($row["senha"]);
                $usuario->setEmail($row["email"]);
                $usuario->setTipo($row["tipo"]);

                $vUsuarios[] = $usuario;
            }

        }
        else{
        
        return Mensagem::getMensagem("MESSAGE_ERROR", "Erro no sistema!.");
        
        }
    return $vUsuarios;
    }

    public function autenticarAdmin($login, $senha, $tipo){

        $sql = "SELECT * FROM usuario where login = '$login' AND senha = '$senha' AND tipo = '$tipo'";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($dados);

        $result = $stmt->fetchAll();

        if (count($result)) {
            foreach ($result as $row) {
                $usuario = new Usuario();
                $usuario->setId($row["id"]);
                $usuario->setNome($row["nome"]);
                $usuario->setSobrenome($row["sobrenome"]);
                $usuario->setLogin($row["login"]);
                $usuario->setSenha($row["senha"]);
                $usuario->setEmail($row["email"]);
                $usuario->setTipo($row["tipo"]);

                $vUsuarios[] = $usuario;

                echo"<script language='javascript' type='text/javascript'>alert('Usuário logado com sucesso!');window.location.href='call.php';</script>";
            }
        }else{
            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
        }

        return $vUsuarios;
    }

    public function remover($vIds) {
        if (count($vIds) > 0) {
            foreach ($vIds as $id) {
                $sql = "DELETE
                        FROM usuario
                        WHERE id = ?";       
                        
                $dados = array($id);
                // Preparação da DML
                $stmt = $this->conexao->prepare($sql);
                // Executa a query
                $stmt->execute($dados);  

                if ($stmt)
                return Mensagem::getMensagem("MESSAGE_SUCCESS", "Altera&ccedil;&atilde;o realizada com sucesso.");
            else
                return Mensagem::getMensagem("MESSAGE_ERROR", "Problemas na altera&ccedil;&atilde;o. Por favor tente novamente.<br> ERRO [" . $stmt->errorInfo() . "]");       
            }
        } 
    }

    public function existe($usuario) {
        return false;
    }
    
}

?>