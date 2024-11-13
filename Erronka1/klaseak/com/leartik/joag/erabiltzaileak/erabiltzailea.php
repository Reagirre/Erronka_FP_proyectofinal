<?php
namespace com\leartik\joag\erabiltzaileak;
class Erabiltzailea {
    private $id_era;
    private $izena;
    private $email;
    private $deskripzioa;

    public function _construct()
    {
        
    }

    public function setId($id_era) {
        $this->id_era = $id_era;
    }

    public function getId() {
        return $this->id_era;
    }

    public function setIzena($izena) {
        $this->izena = $izena;
    }

    public function getIzena() {
        return $this->izena;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function setKomentarioa($deskripzioa) {
        $this->deskripzioa = $deskripzioa;
    }

    public function getKomentarioa() {
        return $this->deskripzioa;
    }

}
?>