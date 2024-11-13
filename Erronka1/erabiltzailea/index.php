<?php
session_start();
require('../klaseak/com/leartik/joag/kotxeak/kotxea.php');
require('../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
use com\leartik\joag\kotxeak\KotxeaDB;

// echo $_GET['agregarAlCarrito'];
// echo $_POST['id'];
// echo $_POST['marka'];
// echo $_POST['prezioa'];

if (isset($_POST['agregarAlCarrito'])) {
    if ( is_numeric($_POST['id']) )
    {
        
        $kotxea = KotxeaDB::selectKotxea($_POST['id']);
        
        if($kotxea != null) {
            include('erabiltzailea.php');
        } else {
            include('kotxeak_id_baliogabea.php');
        }
    }
    else {
        include('kotxeak_id_baliogabea.php');
    }
}
else {
    include('../saskia');
}