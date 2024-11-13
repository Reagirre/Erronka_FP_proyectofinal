<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="Content-Type" content="text/html">
        <title>Renting.net</title>
        <link rel="stylesheet" type="text/css" href="../css/styles-admin.css">
        
    </head>
    <body>
        <h1>Administrazio gunea</h1>
        <p><?php echo $mezua ?></p>
        <form class="login" action="" method="post">
            <p>
                <label for="erabiltzailea">Erabiltzailea</label>
                <input type="text" id="erabiltzailea" name="erabiltzailea">
            </p>
            <p>
                <label for="pasahitza">Pasahitza</label>
                <input type="password" id="pasahitza" name="pasahitza">
            </p>
            <p>
                <input type="submit" name="sartu" value="Sartu">
            </p>
        </form>
    </body>
</html>