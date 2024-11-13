<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// SQLite database connection
$db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $izena = $_POST['izena'];
    $email = $_POST['email'];
    $deskripzioa = $_POST['deskripzioa'];
    // $produktua_id = $_POST['produktua_id'];
    $stmt = $db->prepare('INSERT INTO erabiltzaileak (izena, email, deskripzioa)
     VALUES (:izena, :deskripzioa, :email)');
    $stmt->bindValue(':izena', $izena);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':deskripzioa', $deskripzioa);
    $stmt->execute();

    $id_erabiltzailea = $db->lastInsertId();

    $stmt = $db->prepare("INSERT INTO eskariak (erabiltzailea) VALUES (:id_erabiltzailea)");
    $stmt->bindParam(':id_erabiltzailea', $id_erabiltzailea);
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

    // if ($result) {
    //     echo 'Formulario enviado';
    // } else {
    //     echo 'Error al enviar el formulario';
    // }
    $db = null;
}
include('index.php');