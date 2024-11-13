<?php
// Verificar si se recibió un ID válido en la URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Aquí puedes realizar la lógica para obtener los detalles del objeto con el ID proporcionado
    // Por ejemplo, puedes consultar la base de datos para obtener los detalles del objeto con ese ID

    // Ejemplo de consulta a la base de datos
    $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka1\\kotxeak.db");
    $query = $db->prepare("SELECT * FROM coches WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $objeto = $query->fetch();
    

    if($objeto) {
        // Mostrar los detalles del objeto
        echo "<link href='../css/styles.css' rel='stylesheet'>";
        echo "<h1>". $objeto['marka'] . " ". $objeto['modeloa'] .  "</h1>";
        echo "<h3>". $objeto['kolorea'] . "</h3>";
        echo "<div class='produktuak_img'>
        <img class='produktu_img' src='../../img/" . $objeto['irudia'] . ".jpg'>
        </div>";
        echo "<div>
        <audio id='miAudio' controls='controls' loop muted>
        <source src='../../audio/" . $objeto['audioa'] . ".mp3' type='audio/mp3' />
        </audio>
        </div>";
        echo "<h2><a class='atzera' href='../'> Atzera</a></h2>";
        // Mostrar más detalles según la estructura de tu base de datos
    } else {
        echo "<p>No se encontraron detalles para el ID proporcionado.</p>";
    }
} else {
    echo "<p>ID no válido.</p>";
}
?>