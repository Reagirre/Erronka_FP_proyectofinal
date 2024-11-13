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
    <!-- <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $komentarioa->getId() ?>">
        <p>
            <label for="textua">Erantzunda?</label>
            <input type="checkbox" id="textua" name="textua" value="<?php echo $komentarioa->getErantzuna()?>">
        </p>
        <p>
            <input type="submit" name="gorde" value="Gorde">
        </p>
    </form> -->

    <form action="index.php" method="post">
        <!-- Hidden input for comment ID -->
        <input type="hidden" name="id" value="<?php echo $komentarioa->getId() ?>">

        <!-- Checkbox for 'Erantzunda' -->
        <p>
            <label for="erantzuna">Erantzunda?</label>
            <input type="hidden" name="erantzuna" value="0"> <!-- Hidden field with default value '0' -->
            <input type="checkbox" id="erantzuna" name="erantzuna"
             value="1" <?php echo ($komentarioa->getErantzuna() == 1) ? 'checked' : ''; ?>>
        </p>

        <!-- Submit button -->
        <p>
            <input type="submit" name="gorde" value="Gorde">
        </p>
    </form>

</body>
</html>