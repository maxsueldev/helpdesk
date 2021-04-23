<?php

class Mensagem {

	private $texto;

	public static function getMensagem($tipo, $texto) {
		$mensagem = new Mensagem();

		$mensagem->texto = $texto;

		if ($tipo == "MESSAGE_SUCCESS") return $mensagem->getMensagemSucesso();
		elseif ($tipo == "MESSAGE_ERROR") return $mensagem->getMensagemErro();
		elseif ($tipo == "MESSAGE_INFO") return $mensagem->getMensagemInfo();
	}

	private function getMensagemInfo() {
		$mensagem =	"<div class=\"alert alert-warning\"> \n
	                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button> \n".
	                    $this->texto." \n
	                </div>";
		return $mensagem;	         
	}

	private function getMensagemSucesso() {
		$mensagem =	"<div class=\"alert alert-success\"> \n
	                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button> \n".
	                    $this->texto." \n
	                </div>";
		return $mensagem;
	}

	private function getMensagemErro() {
		$mensagem =	"<div class=\"alert alert-danger\"> \n
	                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button> \n".
	                    $this->texto." \n
	                </div>";
		return $mensagem;	             
	}			
}
?>