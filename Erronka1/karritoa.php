<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Renting.net</title>
        <link rel="stylesheet" type="text/css" href="../css/styles-admin.css">
    </head>
    <body>
        <h1>Saskiaren administrazio gunea</h1>
        
        <p>Eskariak</p>
        <section class="lista">
        <?php foreach ($karritoak as $karritoa) { ?>
            <div class="car-info">
                <h3><?php echo $karritoa->getId() ?></h3>
                <button class="lista-boton aldatu-boton" onclick="window.location.href='kotxe_aldatu/?id=<?php echo $karritoa->getId() ?>'">aldatu</button>
                <button class="lista-boton ezabatu-boton" onclick="window.location.href='kotxe_ezabatu/?id=<?php echo $karritoa->getId() ?>'">ezabatu</button>
            </div>
        <?php } ?>
        </section>
    </body>
</html>