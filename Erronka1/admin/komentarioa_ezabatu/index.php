<?php
session_start();
require('../../klaseak/com/leartik/joag/komentarioak/komentarioa.php');
require('../../klaseak/com/leartik/joag/komentarioak/komentarioa_db.php');
use com\leartik\joag\komentarioak\KomentarioaDB;

if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
    $admin = true;

} else {
    $admin = false;
}
if ($admin == true) {
    if(isset($_POST['bai'])) {
        $id = $_POST['id'];
        if (KomentarioaDB::deleteKomentarioa($id) > 0) {
            include('komentarioa_ezabatu_da.php');
        } else {
            $komentarioa = KomentarioaDB::selectKomentarioa($_POST['id']);
            include('komentarioa_ez_da_ezabatu.php');
        }
    } else if(isset($_POST['ez'])) {        
        $komentarioa = KomentarioaDB::selectKomentarioa($_POST['id']);
        include('komentarioa_ez_da_ezabatu.php');
    } else {
        $komentarioa = "";
        if ( is_numeric($_GET['id']) )
        {
            $komentarioa = KomentarioaDB::selectKomentarioa($_GET['id']);
            if($komentarioa != null) {
                include('komentarioa_ezabatu.php');
            } else {
                include('komentarioa_id_baliogabea.php');
            }
        }
        else {
            include('komentarioa_id_baliogabea.php');
        }      
    }
} else {
    header("location: ../index.php");
} ?>