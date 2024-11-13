<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // SQLite database connection
    $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);

        $izena = $json_obj->izena;
        $deskripzioa = $json_obj->deskripzioa;
        $email = $json_obj->email;
        // Get the current date and time
        $eguna = date("Y-m-d H:i:s");

        // Insert data into the database with prepared statements
        $stmt = $db->prepare('INSERT INTO komentarioak (izena, email, deskripzioa, eguna) VALUES (?, ?, ?, ?)');
        $result = $stmt->execute([$izena, $email, $deskripzioa, $eguna]);

        if ($result) {
            echo 'Formulario enviado';
        } else {
            echo 'Error al enviar el formulario';
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}