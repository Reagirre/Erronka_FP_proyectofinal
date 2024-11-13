<!DOCTYPE html>
<html lang="en">
    <body>
        <h1>Saskiaren administrazio gunea</h1>
        <table class="table table-striped table-bordered align-middle">
            <tr class="table-active">
                <th>#</th>
                <th>Kantitatea</th>
                <th>Eskariak</th>
                <th>Produktua</th>
                <th>Egoera</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($karritoak as $karritoa) { ?>
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
                                        <img class="card-img-top" src="../img/<?php echo $kotxea->getIrudia() ?>.jpg" alt="Kotxe argazkia">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-around">
                                                <div class="card-text">
                                                    <?php echo $kotxea->getMarka() ?> <?php echo $kotxea->getModeloa() ?><br>
                                                    <strong><?php echo $kotxea->getKategoria() ?></strong><br>
                                                    <?php echo $kotxea->getPrezioa() ?>€<br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }
                        ?>
                    </td>
                    
                    <?php if($karritoa->getEnvio() === '0') {?>
                        <td class="table-danger">
                            <strong>Bidali gabe</strong>
                        </td>
                    <?php } else if ($karritoa->getEnvio() === '1'){?>
                        <td class="table-success">
                            <strong>Bidalita</strong>
                        </td>
                    <?php } ?>
                    
                    
                    <td><button class="lista-boton aldatu-boton" onclick="window.location.href='karritoa_aldatu/?id=<?php echo $karritoa->getId() ?>'">aldatu</button></td>
                    <td><button class="lista-boton ezabatu-boton" onclick="window.location.href='karritoa_ezabatu/?id=<?php echo $karritoa->getId() ?>'">ezabatu</button></td>
                </tr>
            <?php } ?>
        </table>
        
    </body>
</html>