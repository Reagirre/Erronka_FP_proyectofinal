<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renting.net</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
</head>
<body>
    <h1>Kategorien administrazio gunea</h1>
    <p><a href="../">Hasiera</a></p>
    <h2>Kategoria aldatu</h2>
    <p>Kategoria ez da gorde</p>
    <table cellspacing="5" cellpadding="5" >
        <tr>
            <td align="right">Izena:</td>
            <td><?php echo $kategoria->getIzena() ?></td>
        </tr>
    </table>
</body>
</html>