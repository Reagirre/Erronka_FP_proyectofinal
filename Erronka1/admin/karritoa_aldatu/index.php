<?php
session_start();
require('../../klaseak/com/leartik/joag/kotxeak/kotxea.php');
require('../../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
require('../../klaseak/com/leartik/joag/karritoa/karrito.php');
require('../../klaseak/com/leartik/joag/karritoa/karritoa_db.php');
require('../../klaseak/com/leartik/joag/eskariak/eskariak.php');
require('../../klaseak/com/leartik/joag/eskariak/eskariak_db.php');
require('../../klaseak/com/leartik/joag/erabiltzaileak/erabiltzailea.php');
require('../../klaseak/com/leartik/joag/erabiltzaileak/erabiltzailea_db.php');
use com\leartik\joag\kotxeak\KotxeaDB;
use com\leartik\joag\karritoa\KarritoaDB;
use com\leartik\joag\karritoa\Karritoa;
use com\leartik\joag\eskariak\EskariakDB;
use com\leartik\joag\erabiltzaileak\ErabiltzaileaDB;

if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
    $admin = true;
} else {
    $admin = false;
}


if ($admin == true) {


    $erabiltzaileak = ErabiltzaileaDB::selectErabiltzaileak();
	$eskariak = EskariakDB::selectEskariak();
    $kotxeak = KotxeaDB::selectKotxeak();


    if (isset($_POST['bidalita'])) {
        $id = $_POST['id'];
        $envio = 'true';
        $karritoa = new Karritoa();
        $karritoa->setId($id); 
        $karritoa->setEnvio($envio);
        if (KarritoaDB::updatekarritoa($karritoa) > 0) {
            include('karritoa_bidali_da.php');
        } else {
            include('karritoa_ez_da_bidali.php');
        }
    }else if (isset($_POST['bidaligabe'])) {
        $id = $_POST['id'];
        $envio = 'false';
        $karritoa = new Karritoa();
        $karritoa->setId($id); 
        $karritoa->setEnvio($envio);
        if (KarritoaDB::updatekarritoa($karritoa) > 0) {
            include('karritoa_bidali_da.php');
        } else {
            include('karritoa_ez_da_bidali.php');
        }
    } else {
        $mezua = "";
        if ( is_numeric($_GET['id']) )
        {
            $karritoa = KarritoaDB::selectKarritoa($_GET['id']);
            
            if($karritoa != null) {
                if ($karritoa->getEnvio() === 'false' || $karritoa->getEnvio() === '0')
                    include('karritoa_aldatu.php');
                else if ($karritoa->getEnvio() === 'true' || $karritoa->getEnvio() === '1' )
                    include('karritoa_aldatuta.php');
            } else {
                include('karritoa_id_baliogabea.php');
            }
        }
        else {
            include('karritoa_id_baliogabea.php');
        } 
            
    }
} else {
    header("location: ../index.php");
}