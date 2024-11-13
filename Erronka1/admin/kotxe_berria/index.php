
<?php
session_start();
require('../../klaseak/com/leartik/joag/kotxeak/kotxea.php');
require('../../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
require('../../klaseak/com/leartik/joag/kategoriak/kategoria.php');
require('../../klaseak/com/leartik/joag/kategoriak/kategoria_db.php');
use com\leartik\joag\kotxeak\Kotxea;
use com\leartik\joag\kotxeak\KotxeaDB;
use com\leartik\joag\kategoriak\KategoriaDB;


$admin = false;

if (isset($_SESSION['erabiltzailea']) && $_SESSION['erabiltzailea'] == "admin") {
    $admin = true;
} else {
    $admin = false;
}


if ($admin == true) {

    $kategoriak = KategoriaDB::selectKategoriak();


    if (isset($_POST['gorde'])) {
        
        $marka = $_POST['marka'];
        $modeloa = $_POST['modeloa'];
        $kolorea = $_POST['kolorea'];
        $kategoria = $_POST['kategoria'];
        $irudia = $_POST['irudia'];
        $prezioa = $_POST['prezioa'];
        if (strlen($marka) > 0 && strlen($modeloa) > 0 && strlen($kolorea) > 0 && strlen($kategoria) > 0 && strlen($irudia) > 0 && strlen($prezioa) > 0) {
            $kotxea = new Kotxea();
            $kotxea->setMarka($marka); 
            $kotxea->setModeloa($modeloa);
            $kotxea->setKolorea($kolorea);
            $kotxea->setKategoria($kategoria);
            $kotxea->setIrudia($irudia);
            $kotxea->setPrezioa($prezioa);
            if (KotxeaDB::insertkotxea($kotxea) > 0) {
                include('kotxea_gorde_da.php');
            } else {
                include('kotxea_ez_da_gorde.php');
            }
        } else {
            $mezua = "Eremu guztiak bete behar dira"; 
            include('kotxe_berria.php');
        }
    } else {
        $marka = "";
        $modeloa = "";
        $kolorea = "";
        $kategoria = "";
        $irudia = "";
        $prezioa = "";
        $mezua = "";
        include('kotxe_berria.php');
    }
} else {
    header("location: ../index.php");
} 


?>