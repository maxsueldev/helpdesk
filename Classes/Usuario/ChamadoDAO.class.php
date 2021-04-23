<?php

class ChamadoDAO{

	private $conexao;

	public function __construct() {
        $this->conexao = Connection::getConnection();
    }

	//FUNCÕES...

    public function selecionar($id, $setor, $relacionado, $data, $status) {

        $sql = "SELECT id, setor, ramal, relacionado, data, hora, mensagem, status FROM chamado WHERE id > 0";

        if (!empty($id)) {
            $sql .= " AND id = ?";
            $dados[] = $id;
        }

        if (!empty($setor)) {
            $sql .= " AND setor LIKE ?";
            $dados[] = $setor."%";
        }

        if (!empty($relacionado)) {
            $sql .= " AND relacionado LIKE ?";
            $dados[] = $relacionado."%";
        }

        if (!empty($data)) {
            $sql .= " AND data = ?";
            $dados[] = $data;
        }

        if (!empty($status)) {
            $sql .= " AND status = ?";
            $dados[] = $status;
        }

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($dados);

        $result = $stmt->fetchAll();

        if (count($result)) {
            foreach ($result as $row) {
                $chamado = new Chamado();
                $chamado->setId($row["id"]);
                $chamado->setSetor($row["setor"]);
                $chamado->setRamal($row["ramal"]);
                $chamado->setRelacionado($row["relacionado"]);
                $chamado->setData($row["data"]);
                $chamado->setHora($row["hora"]);
                $chamado->setMensagem($row["mensagem"]);
                $chamado->setStatus($row["status"]);

                $vChamados[] = $chamado;
            }
        }

        return $vChamados;
    }

    public function selecionarAberto($id, $setor, $relacionado, $data, $status) {

        $sql = "SELECT id, setor, ramal, relacionado, data, hora, mensagem, status FROM chamado WHERE id > 0 AND status = 'Aberto'";

        if (!empty($id)) {
            $sql .= " AND id = ?";
            $dados[] = $id;
        }

        if (!empty($setor)) {
            $sql .= " AND setor LIKE ?";
            $dados[] = $setor."%";
        }

        if (!empty($relacionado)) {
            $sql .= " AND relacionado LIKE ?";
            $dados[] = $relacionado."%";
        }

        if (!empty($data)) {
            $sql .= " AND data = ?";
            $dados[] = $data;
        }

        if (!empty($status)) {
            $sql .= " AND status LIKE ?";
            $dados[] = $status."%";
        }

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($dados);

        $result = $stmt->fetchAll();

        if (count($result)) {
            foreach ($result as $row) {
                $chamado = new Chamado();
                $chamado->setId($row["id"]);
                $chamado->setSetor($row["setor"]);
                $chamado->setRamal($row["ramal"]);
                $chamado->setRelacionado($row["relacionado"]);
                $chamado->setData($row["data"]);
                $chamado->setHora($row["hora"]);
                $chamado->setMensagem($row["mensagem"]);
                $chamado->setStatus($row["status"]);

                $vChamados[] = $chamado;
            }
        }

        return $vChamados;
    }

    public function inserir($chamado) {
        if ($this->existe($chamado)) {
            return Mensagem::getMensagem("MESSAGE_INFO", "O chamado informado j&aacute; existe.");
        } else {
            // Prepara a Query
            $sql = "INSERT INTO chamado (setor, ramal, relacionado, data, hora, mensagem, status) VALUES  (?, ?, ? , ?, ?, ?, ?)";

            $dados = array($chamado->getSetor(), $chamado->getRamal(), $chamado->getRelacionado(), $chamado->getData(), $chamado->getHora(), $chamado->getMensagem(), $chamado->getStatus());

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
            $destinatario = 'maxsuelf94@gmail.com';
            $mail->AddAddress("$destinatario");

            // Define os dados técnicos da Mensagem
            $mail->IsHTML(true); // Define que o e-mail será enviado como HTML

            $id = $chamado->getId();
            $setor = $chamado->getSetor();
            $ramal = $chamado->getRamal();
            $relacionado = $chamado->getRelacionado();
            $data = date('d/m/Y', strtotime($chamado->getData()));
            $hora = $chamado->getHora();
            $mensagem = $chamado->getMensagem();

            // Define a mensagem (Texto e Assunto)
            $mail->Subject  = "HelpDesk!";
            $mail->Body = "Novo chamado!<br/><br/><br/><br/>
            Setor : $setor<br/>
            Ramal : $ramal<br/>
            Relacionado a : $relacionado<br/>
            Data : $data<br/>
            Hora : $hora<br/>
            Problema : $mensagem<br/>            
            <br/><br/><br/> <a href='localhost/SuporteTI/Master/chamadosabertos.php'>Clique aqui para visualizar os chamados abertos</a>";

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
                echo Mensagem::getMensagem("MESSAGE_SUCCESS", "Um email foi enviado com a solicitacao do chamado");
            } else {
            echo "Não foi possível enviar o e-mail.<br /><br />";
            echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
            echo Mensagem::getMensagem("MESSAGE_ERROR", "O email nao foi enviado, porem o chamado foi aberto");
            }    
      
        }
    } 

    public function atualizar($chamado) {

        if ($this->existe($chamado)) {
            return Mensagem::getMensagem("MESSAGE_INFO", "O Chamado informado j&aacute; est&aacute; cadastrado. Nenhuma Altera&ccedil;&atilde;o realizada");
        } else {
            // Prepara a Query
            $sql = "UPDATE chamado SET setor = ?, ramal = ?, relacionado = ?, data = ?, hora = ?, mensagem = ?, status = ? WHERE id = ?";

            $dados = array($chamado->getSetor(), $chamado->getRamal(), $chamado->getRelacionado(), $chamado->getData(), $chamado->getHora(), $chamado->getMensagem(), $chamado->getStatus(), $chamado->getId());

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

    public function remover($vIds) {
        if (count($vIds) > 0) {
            foreach ($vIds as $id) {
                $sql = "DELETE
                        FROM chamado
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

    public function existe($contato) {
        return false;
    }
}

?>
