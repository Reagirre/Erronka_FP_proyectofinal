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
    <p>Komentarioa aldatu</p>
    <p><?php echo $mezua ?></p>
    <table cellspacing="5" cellpadding="5" >
        <tr>
            <td align="right">Izena</td>
            <td><?php echo $komentarioa->getIzena() ?></td>
        </tr>
        <tr>
            <td align="right">Email</td>
            <td><?php echo $komentarioa->getEmail() ?></td>
        </tr>
        <tr>
            <td align="right">Komentarioa</td>
            <td><?php echo $komentarioa->getKomentarioa() ?></td>
        </tr>
        <tr>
            <td align="right">Eguna</td>
            <td><?php echo $komentarioa->getEguna() ?></td>
        </tr>
    </table>
    <p><strong>Komentarioa erantzunda dago</strong></p>

</body>
</html>