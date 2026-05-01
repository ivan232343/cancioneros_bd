<?php
$record = new model_canciones();
$get_all_canciones = $record->sp_g_all_canciones();

?>

<div class="box-_flex _direction-col _gap-10">
    <h3>Listado de canciones</h3>
    <div class="box- _flex _direction-col _gap-5">
        <?php foreach($get_all_canciones as $cancion): ?>
            <div class="box-data_song">
                <div class="box-child_data tittle _flex _direction-row _aling-center">
                    <div class="box momento"><?= $cancion['momento_misa'] ?></div>
                    <div class="box tiempo"><?= $cancion['nombre_tiempo'] ?></div>
                </div>
                <div class="box-child_data metadata _flex _direction-row _aling-center">
                    <div class="box indice"><?= $cancion['id_cancion'] ?></div>
                    <div class="box titulo_artista"><?= $cancion['titulo'] ?> - <?= $cancion['artista'] ?></div>
                </div>
                <div class="box-child_data lyrics _flex _direction-col _gap-5">
                    <div class="box letra">
                        <?= $cancion['example_letra'] ?>...
                    </div>
                    <div class="box link_full_letra">
                        <button data-show_id="<?= $cancion['id_cancion'] ?>" class="">Ver letra completa</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>