<?php
namespace com\leartik\joag\kotxeak;
class Kotxea {
    private $id;
    private $marka;
    private $modeloa;
    private $kolorea;
    private $kategoria;
    private $irudia;
    private $audioa;
    private $prezioa;

    public function _construct()
    {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setMarka($marka) {
        $this->marka = $marka;
    }

    public function getMarka() {
        return $this->marka;
    }

    public function setModeloa($modeloa) {
        $this->modeloa = $modeloa;
    }

    public function getModeloa() {
        return $this->modeloa;
    }

    public function setKolorea($kolorea) {
        $this->kolorea = $kolorea;
    }

    public function getKolorea() {
        return $this->kolorea;
    }
    
    public function setKategoria($kategoria) {
        $this->kategoria = $kategoria;
    }
    public function getKategoria() {
        return $this->kategoria;
    }
    public function setIrudia($irudia) {
        $this->irudia = $irudia;
    }
    public function getIrudia() {
        return $this->irudia;
    }

    public function setAudioa($audioa) {
        $this->audioa = $audioa;
    }
    public function getAudioa() {
        return $this->audioa;
    }

    public function setPrezioa($prezioa) {
        $this->prezioa = $prezioa;
    }
    public function getPrezioa() {
        return $this->prezioa;
    }
}
?>