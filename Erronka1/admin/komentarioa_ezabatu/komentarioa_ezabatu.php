<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renting.net</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
</head>
<body>
    <h1>Komentarioen administrazio gunea</h1>
    <p><a href="..">Hasiera</a></p>
    <p>Komentarioa ezabatu</p>
    <table cellspacing="5" cellpadding="5" >
        <tr>
            <td align="right">Izena:</td>
            <td><?php echo $komentarioa->getIzena() ?></td>
        </tr>
        <tr>
            <td align="right">Email:</td>
            <td><?php echo $komentarioa->getEmail() ?></td>
        </tr>
        <tr>
            <td align="right">Komentarioa:</td>
            <td><?php echo $komentarioa->getKomentarioa() ?></td>
        </tr>
        <tr>
            <td align="right">Eguna:</td>
            <td><?php echo $komentarioa->getEguna() ?></td>
        </tr>
    </table>
    <form class="admin-ezabatu" action="index.php" method="post">     
        <input type="hidden" name="id" value="<?php echo $komentarioa->getId() ?>">               
        <button type="submit" name="bai">Bai</button>
        <button type="submit" name="ez">Ez</button>
    </form>
</body>
</html>