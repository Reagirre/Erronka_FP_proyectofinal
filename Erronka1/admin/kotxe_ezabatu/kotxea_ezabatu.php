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
    <p>Kotxea ezabatu</p>
    <table cellspacing="5" cellpadding="5" >
        <tr>
            <td align="right">Marka:</td>
            <td><?php echo $kotxea->getMarka() ?></td>
        </tr>
        <tr>
            <td align="right">Modeloa:</td>
            <td><?php echo $kotxea->getModeloa() ?></td>
        </tr>
        <tr>
            <td align="right">Kolorea:</td>
            <td><?php echo $kotxea->getKolorea() ?></td>
        </tr>
        <tr>
            <td align="right">Kategoria:</td>
            <td><?php echo $kotxea->getKategoria() ?></td>
        </tr>
        <tr>
            <td align="right">Irudia:</td>
            <td><?php echo $kotxea->getIrudia() ?></td>
        </tr>
        <tr>
            <td align="right">Prezioa:</td>
            <td><?php echo $kotxea->getPrezioa() ?></td>
        </tr>
    </table>
    <form class="admin-ezabatu" action="index.php" method="post">     
        <input type="hidden" name="id" value="<?php echo $kotxea->getId() ?>">               
        <button type="submit" name="bai">Bai</button>
        <button type="submit" name="ez">Ez</button>
    </form>
</body>
</html>