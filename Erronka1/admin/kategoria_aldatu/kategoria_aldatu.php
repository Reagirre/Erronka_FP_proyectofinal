<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renting.net</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
</head>
<body>
    <h1>Kategorien administrazio gunea</h1>
    <p><a href="..">Hasiera</a></p>
    <p>Kategoria aldatu</p>
    <p><?php echo $mezua ?></p>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $kategoria->getId() ?>">
        <p>
            <label for="izena">Izena</label>
            <input type="text" id="izena" name="izena" value="<?php echo $kategoria->getIzena()?>">
        </p>
        <p>
            <input type="submit" name="gorde" value="Gorde">
        </p>
    </form>
</body>
</html>