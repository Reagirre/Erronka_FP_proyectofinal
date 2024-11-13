<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renting.net</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
</head>
<body>
    <h1>Kotxeen administrazio gunea</h1>
    <p><a href="..">Hasiera</a></p>
    <p>Kotxea aldatu</p>
    <p><?php echo $mezua ?></p>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $kotxea->getId() ?>">
        <p>
            <label for="marka">Marka</label>
            <input type="text" id="marka" name="marka" value="<?php echo $kotxea->getMarka()?>">
        </p>
        <p>
            <label for="modeloa">Modeloa</label>
            <input id="modeloa" name="modeloa" value="<?php echo $kotxea->getModeloa()  ?>">
        </p>
        <p>
            <label for="kolorea">Kolorea</label>
            <input id="kolorea" name="kolorea" value="<?php echo $kotxea->getKolorea() ?>">
        </p>
        <p>
            <label for="kategoria">Kategoria</label>
            <select id="kategoria" name="kategoria">
                <?php foreach ($kategoriak as $kategoria) {
                    echo '<option value="' . $kategoria->getId() . '"';
                    
                    if ($kategoria->getIzena() == $kotxea->getKategoria()) {
                        echo ' selected';
                    }

                    echo '>' . $kategoria->getIzena() . '</option>';
                }
                ?>
            </select>
        </p>
        <p>
            <label for="irudia">Irudia</label>
            <input id="irudia" name="irudia" value="<?php echo $kotxea->getIrudia() ?>">.jpg
        </p>
        <p>
            <label for="prezioa">Prezioa</label>
            <input type="number" id="prezioa" name="prezioa" value="<?php echo $kotxea->getPrezioa()?>">
        </p>
        <p>
            <input type="submit" name="gorde" value="Gorde">
        </p>
    </form>
</body>
</html>
