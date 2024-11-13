<?php
namespace com\leartik\joag\eskariak;
class Eskaria {
    private $id;
    private $erabiltzailea;

    public function _construct()
    {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setErabiltzailea($erabiltzailea) {
        $this->erabiltzailea = $erabiltzailea;
    }

    public function getErabiltzailea() {
        return $this->erabiltzailea;
    }

}