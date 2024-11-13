<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renting.net</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles-admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Saskiaren administrazio gunea</h1>
    <p><a href="..">Hasiera</a></p>
    <p>Saskia aldatu</p>
    <p><?php echo $mezua ?></p>
    <section class="lista">
        <table>
            <tr>
                <th>#</th>
                <th>kantitatea</th>
                <th>eskariak</th>
                <th>produktua</th>
                <th>Egin klik hemen ez bada bidali</th>
            </tr>
                <tr>
                    <td><?php echo $karritoa->getId(); ?></td>
                    <td><?php echo $karritoa->getCantidad() ?></td>
                    <td>
                        <?php 
                            foreach ($eskariak as $eskaria) {
                                if ($eskaria->getId() == $karritoa->getId_eskaria()) { 
                                    foreach ($erabiltzaileak as $erabiltzailea) {
                                        if ($eskaria->getErabiltzailea() == $erabiltzailea->getId()) { 
                                            ?><p>Izena: <?php echo $erabiltzailea->getIzena() ?></p>
                                            <p>Email-a: <?php echo $erabiltzailea->getEmail() ?></p>
                                       <?php }
                                    }
                                    ?>
                               <?php }
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            foreach ($kotxeak as $kotxea) {
                                if ($kotxea->getId() == $karritoa->getId_produktua()) { ?>
                                    
                                    <div class="card" style="width: 18rem;" data-category="<?php echo $kotxea->getKategoria(); ?>">
                                        <img class="card-img-top" src="../../img/<?php echo $kotxea->getIrudia() ?>.jpg" alt="Kotxe argazkia">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-around">
                                                <div class="card-text">
                                                    <?php echo $kotxea->getMarka() ?> <?php echo $kotxea->getModeloa() ?><br>
                                                    <strong><?php echo $kotxea->getKategoria() ?></strong><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               <?php }
                            }
                        ?>
                    </td>
                    
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $karritoa->getId() ?>">
                            <input type="submit" name="bidaligabe" value="Bidaligabe">
                        </form>
                    </td>
                </tr>
        </table>
        </section>
</body>
</html>