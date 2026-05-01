<?php
$record = new model_canciones();
$conteo_canciones = $record->sp_g_count_canciones();
?>

<div class="_flex _direction-col">
    Hay <?= $conteo_canciones[0]['conteo_canciones'] ?> letras de canciones subidos 
</div>

<?php unset($record, $conteo_canciones); ?>
