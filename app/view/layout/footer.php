
<?php
 $components = [
    'load.modules',
    'listado',
    'password',
    'save.cli',
    'tip.gen',
    'manage.btns',
    'main.manage'
];
foreach ($components as $component): ?>
<script src="<?= BASE_URL?>public/js/<?= $component ?>.js"></script>
<?php endforeach; ?>
