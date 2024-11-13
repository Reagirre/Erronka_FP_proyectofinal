<?php
session_start();
require('../../klaseak/com/leartik/joag/komentarioak/komentarioa.php');
require('../../klaseak/com/leartik/joag/komentarioak/komentarioa_db.php');
use com\leartik\joag\komentarioak\Komentarioa;
use com\leartik\joag\komentarioak\KomentarioaDB;

if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
    $admin = true;

} else {
    $admin = false;
}
if ($admin == true) {

    if (isset($_POST['gorde'])) {
        $id = $_POST['id'];
        $erantzuna = $_POST['erantzuna'];
        if (strlen($erantzuna) > 0) {
            $komentarioa = new Komentarioa();
            $komentarioa->setId($id); 
            $komentarioa->setErantzuna($erantzuna);
            if (KomentarioaDB::updatekomentarioa($komentarioa) > 0) {
                include('komentarioa_gorde_da.php');
            } else {
                include('komentarioa_ez_da_gorde.php');
            }
        } else {
            $komentarioa = new Komentarioa();
            $komentarioa->setId($id); 
            $komentarioa->setErantzuna($erantzuna);
            if (KomentarioaDB::updatekomentarioa($komentarioa) > 0) {
                include('komentarioa_gorde_da.php');
            } else {
                include('komentarioa_ez_da_gorde.php');
            }
        }
    } else {
        
        $mezua = "";
        if ( is_numeric($_GET['id']) )
        {
            $komentarioa = KomentarioaDB::selectKomentarioa($_GET['id']);
            if($komentarioa != null) {
                if($komentarioa->getErantzuna() > 0) {
                    include('komentarioa_aldatuta.php');
                }else {
                    include('komentarioa_aldatu.php');
                }
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
} 