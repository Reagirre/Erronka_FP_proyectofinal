<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renting.net</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
</head>
    <body>
    <h1>Komentarioen administrazio gunea</h1>
        <p><a href="../">Hasiera</a></p>
        <h2>Komentarioa aldatu</h2>
        <p>Komentarioa gorde da</p>
        <table cellspacing="5" cellpadding="5" >
            <tr>
                <td align="right">Komentarioa:</td>
                <td>
                    <?php if ($komentarioa->getErantzuna() > 0) { ?>
                        <strong>Erantzunda</strong>
                    <?php } else { ?>
                        <strong>Erantzun gabea</strong>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </body>
</html>