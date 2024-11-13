<?php
session_start();
require('../../klaseak/com/leartik/joag/kotxeak/kotxea.php');
require('../../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
use com\leartik\joag\kotxeak\KotxeaDB;

if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
    $admin = true;

} else {
    $admin = false;
}
if ($admin == true) {
    if(isset($_POST['bai'])) {
        $id = $_POST['id'];
        if (KotxeaDB::deleteKotxea($id) > 0) {
            include('kotxea_ezabatu_da.php');
        } else {
            $kotxea = KotxeaDB::selectKotxea($_POST['id']);
            include('kotxea_ez_da_ezabatu.php');
        }
    } else if(isset($_POST['ez'])) {        
        $kotxea = KotxeaDB::selectKotxea($_POST['id']);
        include('kotxea_ez_da_ezabatu.php');
    } else {
        $mezua = "";
        if ( is_numeric($_GET['id']) )
        {
            $kotxea = KotxeaDB::selectKotxea($_GET['id']);
            if($kotxea != null) {
                include('kotxea_ezabatu.php');
            } else {
                include('kotxea_id_baliogabea.php');
            }
        }
        else {
            include('kotxea_id_baliogabea.php');
        }      
    }
} else {
    header("location: ../index.php");
} ?>