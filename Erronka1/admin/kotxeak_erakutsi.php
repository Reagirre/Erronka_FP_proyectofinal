<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Renting.net</title>
        <link rel="stylesheet" type="text/css" href="../css/styles-admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <h1>Kotxeen administrazio gunea</h1>
        
        <form action="kotxe_berria" method="post">
            <p><input type="submit" value="Kotxe berria"></p>
        </form>
        <div class="kotxeak-admin">
            <?php foreach ($kotxeak as $kotxea) { ?>
                <div class="car-info">
                    <!-- <h3><?php echo $kotxea->getMarka() ?></h3> -->
                    <div class="card" style="width: 18rem;" data-category="<?php echo $kotxea->getKategoria(); ?>">
                        <img class="card-img-top" src="../img/<?php echo $kotxea->getIrudia() ?>.jpg" alt="Kotxe argazkia">
                        <div class="card-body">
                            <div class="d-flex justify-content-around">
                                <div class="card-text">
                                    <?php echo $kotxea->getMarka() ?> <?php echo $kotxea->getModeloa() ?><br>
                                    <strong><?php echo $kotxea->getKategoria() ?></strong><br>
                                    <button class="lista-boton aldatu-boton" onclick="window.location.href='kotxe_aldatu/?id=<?php echo $kotxea->getId() ?>'">aldatu</button>
                                    <button class="lista-boton ezabatu-boton" onclick="window.location.href='kotxe_ezabatu/?id=<?php echo $kotxea->getId() ?>'">ezabatu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>