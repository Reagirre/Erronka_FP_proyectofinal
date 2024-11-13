<?php
namespace com\leartik\joag\komentarioak;
class Komentarioa {
    private $id;
    private $izena;
    private $email;
    private $deskripzioa;
    private $eguna;
    private $erantzuna;

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

    public function setEguna($eguna) {
        $this->eguna = $eguna;
    }

    public function getEguna() {
        return $this->eguna;
    }

    public function setErantzuna($erantzuna) {
        $this->erantzuna = $erantzuna;
    }

    public function getErantzuna() {
        return $this->erantzuna;
    }
}
?>