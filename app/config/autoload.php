<?php

// require_once  __DIR__."../../../config/config.class.php";
function controller_autoload($classname)
{
    $paths = [
        __DIR__ . "/../controller/$classname.php",
        __DIR__ . "/../model/$classname.php",
        __DIR__ . "/$classname.php"
    ];

    foreach ($paths as $archive) {
        if (is_file($archive)) {
            require_once $archive;
            return;
        }
    }
}
spl_autoload_register('controller_autoload');