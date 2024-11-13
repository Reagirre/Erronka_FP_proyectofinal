<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html">
        <title>Renting.net</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
    </head>
    <body>
        <h1>Kotxeen administrazio gunea</h1>
        <p><a href="..">Hasiera</a></p>
        <h2>Kotxe berria</h2>
        <p><?php echo $mezua ?></p>
        <form action="index.php" method="post">
            <p>
                <label for="marka">Marka</label>
                <input type="text" id="marka" name="marka" value="<?php echo $marka ?>">
            </p>
            <p>
                <label for="modeloa">Modeloa</label>
                <input id="modeloa" name="modeloa" value="<?php echo $modeloa ?>">
            </p>
            <p>
                <label for="kolorea">Kolorea</label>
                <input id="kolorea" name="kolorea" value="<?php echo $kolorea ?>">
            </p>
            <p>
                <label for="kategoria">Kategoria</label>
                <select id="kategoria" name="kategoria">
                    <?php foreach ($kategoriak as $kategoria): ?>
                        <option value="<?php echo $kategoria->getId(); ?>"><?php echo $kategoria->getIzena(); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="irudia">Irudia</label>
                <input id="irudia" name="irudia" value="<?php echo $irudia?>">.jpg
            </p>
            <p>
                <label for="prezioa">Prezioa</label>
                <input type="number" id="prezioa" name="prezioa" value="<?php echo $prezioa?>">
            </p>
            <p>
                <input type="submit" name="gorde" value="Gorde">
            </p>
        </form>
    </body>
</html>