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
    if(isset($_POST['bai'])) {
        $id = $_POST['id'];
        if (KategoriaDB::deleteKategoria($id) > 0) {
            include('kategoria_ezabatu_da.php');
        } else {
            $kategoria = KategoriaDB::selectKategoria($_POST['id']);
            include('kategoria_ez_da_ezabatu.php');
        }
    } else if(isset($_POST['ez'])) {        
        $kategoria = KategoriaDB::selectKategoria($_POST['id']);
        include('kategoria_ez_da_ezabatu.php');
    } else {
        $mezua = "";
        if ( is_numeric($_GET['id']) )
        {
            $kategoria = KategoriaDB::selectKategoria($_GET['id']);
            if($kategoria != null) {
                include('kategoria_ezabatu.php');
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