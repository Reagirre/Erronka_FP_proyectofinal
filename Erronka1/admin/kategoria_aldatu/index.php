<?php
session_start();
require('../../klaseak/com/leartik/joag/kategoriak/kategoria.php');
require('../../klaseak/com/leartik/joag/kategoriak/kategoria_db.php');
use com\leartik\joag\kategoriak\Kategoria;
use com\leartik\joag\kategoriak\KategoriaDB;

if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
    $admin = true;

} else {
    $admin = false;
}
if ($admin == true) {

    if (isset($_POST['gorde'])) {
        $id = $_POST['id'];
        $izena = $_POST['izena'];
        if (strlen($izena) > 0) {
            $kategoria = new Kategoria();
            $kategoria->setId($id); 
            $kategoria->setIzena($izena);
            if (KategoriaDB::updatekategoria($kategoria) > 0) {
                include('kategoria_gorde_da.php');
            } else {
                include('kategoria_ez_da_gorde.php');
            }
        } else {
            $kategoria = KategoriaDB::selectKategoria($id);
            $kategoria->setIzena($izena);
            $mezua = "Eremu guztiak bete behar dira"; 
            include('kategoria_aldatu.php');
        }
    } else {
        
        $mezua = "";
        if ( is_numeric($_GET['id']) )
        {
            $kategoria = KategoriaDB::selectKategoria($_GET['id']);
            if($kategoria != null) {
                include('kategoria_aldatu.php');
            } else {
                include('kategoria_id_baliogabea.php');
            }
        }
        else {
            include('kategoria_id_baliogabea.php');
        } 
            
    }
} else {
    header("location: ../index.php");
} ?>