<?php
namespace com\leartik\joag\karritoa;
class Karritoa {
    private $id;
    private $id_eskaria;
    private $id_produktua;
    private $cantidad;
    private $envio;

    public function _construct()
    {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId_eskaria($id_eskaria) {
        $this->id_eskaria = $id_eskaria;
    }

    public function getId_eskaria() {
        return $this->id_eskaria;
    }

    public function setId_produktua($id_produktua) {
        $this->id_produktua = $id_produktua;
    }

    public function getId_produktua() {
        return $this->id_produktua;
    }
    
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
    
    public function setEnvio($envio) {
        $this->envio = $envio;
    }

    public function getEnvio() {
        return $this->envio;
    }

}
?>