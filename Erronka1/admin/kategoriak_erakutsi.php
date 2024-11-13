<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Renting.net</title>
        <link rel="stylesheet" type="text/css" href="../css/styles-admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <h1>Kategorien administrazio gunea</h1>
        
        <form action="kategoria_berria" method="post">
            <p><input type="submit" value="Kategoria berria"></p>
        </form>

        <section class="lista">
            <?php for ($i = 0; $i < count($kategoriak); $i++) { ?>
                <div class="category-info">
                    <h3><?php echo $kategoriak[$i]->getIzena() ?></h3>
                    <button class="lista-boton aldatu-boton" onclick="window.location.href='kategoria_aldatu/?id=<?php echo $kategoriak[$i]->getId() ?>'">aldatu</button>
                    <button class="lista-boton ezabatu-boton" onclick="window.location.href='kategoria_ezabatu/?id=<?php echo $kategoriak[$i]->getId() ?>'">ezabatu</button>
                </div>
            <?php } ?>
            </section>

        <!-- <p><a href="irten.php">Sesiotik irten</a></p> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>