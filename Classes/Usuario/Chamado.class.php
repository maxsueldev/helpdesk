<?php

class Chamado {

    private $id;
    private $setor;
    private $ramal;
	private $relacionado;
	private $data;
    private $hora;
    private $mensagem;
    private $status; 

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }    

    public function getSetor() {
        return $this->setor;
    }

    public function setSetor($setor) {
        $this->setor = $setor;
    }

    public function getRamal() {
        return $this->ramal;
    }

    public function setRamal($ramal) {
        $this->ramal = $ramal;
    }

    public function getRelacionado() {
        return $this->relacionado;
    }

    public function setRelacionado($relacionado) {
        $this->relacionado = $relacionado;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}

?>