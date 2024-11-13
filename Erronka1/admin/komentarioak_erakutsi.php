<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Renting.net</title>
        <link rel="stylesheet" type="text/css" href="../css/styles-admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <h1>Komentarioen administrazio gunea</h1>

        <table class="table table-striped table-bordered align-middle">
            <tr class="table-active">
                <th>Eguna</th>
                <th>Komentarioa</th>
                <th>Egoera</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($komentarioak as $komentarioa) { ?>
            <tr>
                <td><?php echo $komentarioa->getEguna() ?></td>
                <td><?php echo $komentarioa->getKomentarioa() ?></td>
                <?php if ( $komentarioa->getErantzuna() > 0) { ?>
                <td class="table-success">
                    <strong>Erantzunda</strong>
                </td>
                <?php } ?>
                <?php if ( $komentarioa->getErantzuna() == 0) { ?>
                <td class="table-danger">
                    <strong>Erantzun gabe</strong>
                </td>
                <?php } ?>
                <td class="table-borderless">
                    <button class="lista-boton aldatu-boton" onclick="window.location.href='komentarioa_aldatu/?id=<?php echo $komentarioa->getId() ?>'">aldatu</button>
                </td>
                <td>
                    <button class="lista-boton ezabatu-boton" onclick="window.location.href='komentarioa_ezabatu/?id=<?php echo $komentarioa->getId() ?>'">ezabatu</button>
                </td>
            </tr>
            <?php } ?>
        </table>
        <!-- <p><a href="irten.php">Sesiotik irten</a></p> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>