<?php 
session_start();
require('../klaseak/com/leartik/joag/kotxeak/kotxea.php');
require('../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
require('../klaseak/com/leartik/joag/kategoriak/kategoria.php');
require('../klaseak/com/leartik/joag/kategoriak/kategoria_db.php');

use com\leartik\joag\kategoriak\KategoriaDB;
use com\leartik\joag\kotxeak\KotxeaDB;

$kategoriak = KategoriaDB::selectKategoriak();
$kotxeak = KotxeaDB::selectKotxeak();

// if(isset($_POST['boton'])) {
//     $id = $_POST['id'];
//     $kotxea = KotxeaDB::selectKotxea($id);
    
//     // Si el producto ya está en el carrito, incrementa su cantidad
//     if(isset($_SESSION['carrito'][$id])) {
//         $_SESSION['carrito'][$id]['cantidad'] += 1;
//     } else {
//         // Si no está en el carrito, agrega el producto con cantidad 1
//         $_SESSION['carrito'][$id] = array(
//             "id" => $kotxea->getId(),
//             "marka" => $kotxea->getMarka(),
//             "prezioa" => $kotxea->getPrezioa(),
//             "cantidad" => 1 // Inicializa la cantidad en 1
//         );
//     }

//     include('saskia.php');
// }

if (isset($_POST['boton-vaciar'])) {
    unset($_SESSION['carrito']);
    include('saskia.php');
}

elseif (isset($_POST['boton-borrar'])) {
    $id = $_POST['id'];
    unset($_SESSION['carrito'][$id]);
    include('saskia.php');
}

elseif (isset($_POST['boton-sumar'])) {
        $id = $_POST['id'];
        $kotxea = KotxeaDB::selectKotxea($id);
        // Si el producto ya está en el carrito, incrementa su cantidad
        if(isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] += 1;
        }
        include('saskia.php');
}

elseif (isset($_POST['boton-restar'])) {
        $id = $_POST['id'];
        $kotxea = KotxeaDB::selectKotxea($id);
        // Si el producto ya está en el carrito, incrementa su cantidad
        if ($_SESSION['carrito'][$id]['cantidad'] > 1) {
            if(isset($_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id]['cantidad'] -= 1;
            }
        }
        include('saskia.php');
}

elseif (isset($_POST['boton-enviar'])) {
    include('carrito.php');
}

elseif (isset($_POST['boton_sartu'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // SQLite database connection
    $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $izena = $_POST['izena'];
        $email = $_POST['email'];
        $deskripzioa = $_POST['deskripzioa'];

        $stmt = $db->prepare('INSERT INTO erabiltzaileak (izena, email, deskripzioa)
        VALUES (:izena, :email, :deskripzioa)');
        $stmt->bindValue(':izena', $izena);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':deskripzioa', $deskripzioa);
        $stmt->execute();
        $erabiltzailea = $db->lastInsertId();


        $stmt = $db->prepare("INSERT INTO eskariak (erabiltzailea) VALUES (:erabiltzailea)");
        $stmt->bindParam(':erabiltzailea', $erabiltzailea);
        $stmt->execute();

        $id_eskaria = $db->lastInsertId();

        foreach($_SESSION['carrito'] as $producto) {
            
            $id_produktua = $producto["id"];
            $cantidad = $producto['cantidad'];
            $stmt = $db->prepare("INSERT INTO eskariko_produktuak (id_eskaria, id_produktua, cantidad) VALUES (:id_eskaria, :id_produktua, :cantidad)");
            $stmt->bindParam(':id_eskaria', $id_eskaria);
            $stmt->bindParam(':id_produktua', $id_produktua);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();
        }

        // Insert data into the database
        // $stmt->bindValue(':produktua_id', $produktua_id);

        $result = $stmt->execute();

        if ($result) {
            echo 'Formulario enviado';
        } else {
            echo 'Error al enviar el formulario';
        }
        $db = null;
    }
    unset($_SESSION['carrito']);
    include('saskia.php');
}
else{
    include('saskia.php');
}






// session_start();
// require('../klaseak/com/leartik/joag/kotxeak/kotxea.php');
// require('../klaseak/com/leartik/joag/kotxeak/kotxea_db.php');
// require('../klaseak/com/leartik/joag/kategoriak/kategoria.php');
// require('../klaseak/com/leartik/joag/kategoriak/kategoria_db.php');

// use com\leartik\joag\kategoriak\KategoriaDB;
// use com\leartik\joag\kotxeak\KotxeaDB;

// $kategoriak = KategoriaDB::selectKategoriak();
// $kotxeak = KotxeaDB::selectKotxeak();

// if (isset($_GET['id'])) {
//     $kotxea = KotxeaDB::selectKotxea($_GET['id']);
//     $id = $kotxea->getId();
//     $marka = $kotxea->getMarka();
//     $modeloa = $kotxea->getModeloa();
//     $irudia = $kotxea->getIrudia();
//     $prezioa = $kotxea->getPrezioa();


//     $producto = array(
//         "id" => $kotxea->getId(),
//         "marka" => $kotxea->getMarka(),
//         "prezioa" => $kotxea->getPrezioa()
//     );

//     if (!isset($_SESSION['carrito'])) {
//         $_SESSION['carrito'] = array();
//     }
//     $_SESSION['carrito'][] = $producto;

//     include('saskia.php');

// }else {
//     include('saskia.php');
// }

