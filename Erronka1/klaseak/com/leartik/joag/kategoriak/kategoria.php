<?php
namespace com\leartik\joag\kategoriak;
class Kategoria {
    private $id;
    private $izena;

    public function _construct()
    {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setIzena($izena) {
        $this->izena = $izena;
    }

    public function getIzena() {
        return $this->izena;
    }
}
?>