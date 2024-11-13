<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html">
        <title>Renting.net</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
    </head>
    <body>
        <h1>Kategorien administrazio gunea</h1>
        <p><a href="..">Hasiera</a></p>
        <h2>Kategori berria</h2>
        <p><?php echo $mezua ?></p>
        <form action="index.php" method="post">
            <p>
                <label for="izena">Izena</label>
                <input type="text" id="izena" name="izena" value="<?php echo $izena ?>">
            </p>
            <p>
                <input type="submit" name="gorde" value="Gorde">
            </p>
            
        </form>
    </body>
</html>