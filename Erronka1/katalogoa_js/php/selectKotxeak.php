<?php
// Database connection
$db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");

// Select data from the database
$registros = $db->query("SELECT coches.id, coches.marka, coches.modeloa, coches.kolorea, coches.irudia,coches.audioa, kategoriak.izena
FROM coches
JOIN kategoriak ON coches.kategoria = kategoriak.id");

$kotxeak = array();
$kategoriak = array();

while ($registro = $registros->fetch()) {
    $kotxea = array(
        'id' => $registro['id'],
        'marka' => $registro['marka'],
        'modeloa' => $registro['modeloa'],
        'kolorea' => $registro['kolorea'],
        'kategoria' => $registro['izena'],
        'irudia' => $registro['irudia'],
        'audioa' => $registro['audioa'],
    );
    $kotxeak[] = $kotxea;

    // Collect unique categories
    if (!in_array($registro['izena'], $kategoriak)) {
        $kategoriak[] = $registro['izena'];
    }
}

// Return the data as JSON
$response = array(
    'kotxeak' => $kotxeak,
    'kategoriak' => $kategoriak
);

header('Content-Type: application/json');
echo json_encode($response);
?>