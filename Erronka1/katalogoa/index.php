<?php 
session_start();
require('../klaseak/com/leartik/joag/kotxeak/kotxea.php');
require('../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
require('../klaseak/com/leartik/joag/kategoriak/kategoria.php');
require('../klaseak/com/leartik/joag/kategoriak/kategoria_db.php');

use com\leartik\joag\kategoriak\KategoriaDB;
use com\leartik\joag\kotxeak\KotxeaDB;

$kategoriak = KategoriaDB::selectKategoriak();

if (isset($_GET['id'])) {
	$mezua = "";
	if ( is_numeric($_GET['id']) )
	{
		
		$kotxea = KotxeaDB::selectKotxea($_GET['id']);
		
		if($kotxea != null) {
			include('kotxea_erakutsi.php');
		} else {
			include('kotxeak_id_baliogabea.php');
		}
	}
	else {
		include('kotxeak_id_baliogabea.php');
	}
}else {
	$kotxeak = KotxeaDB::selectKotxeak();
	include('kotxeak_erakutsi.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['boton'])) {
        $id = $_POST['id'];
        $kotxea = KotxeaDB::selectKotxea($id);
        
        // Si el producto ya está en el carrito, incrementa su cantidad
        if(isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] += 1;
        } else {
            // Si no está en el carrito, agrega el producto con cantidad 1
            $_SESSION['carrito'][$id] = array(
                "id" => $kotxea->getId(),
                "marka" => $kotxea->getMarka(),
                "modeloa" => $kotxea->getModeloa(),
                "prezioa" => $kotxea->getPrezioa(),
                "cantidad" => 1 // Inicializa la cantidad en 1
            );
        }
        // include('saskia.php');
    }
    
}
