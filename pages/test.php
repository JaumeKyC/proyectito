<?php require_once 'autoloader.php';
$helios = new HeliosCorp();

echo $helios->getStock(1);

/* <label class="label">Comunidad</label>
    <div class="control">
        <div class="select">
            <select required name="Comunidad">
                <?= $helios->drawProductosOptions() ?>
            </select>
        </div>
    </div> */