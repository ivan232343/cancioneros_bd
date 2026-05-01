<?php
require_once __DIR__. '/../app/config/database.php';
require_once __DIR__. '/../app/config/autoload.php';
$record = new model_canciones();
$base = new base_config();
$base->loader_function();
call_model("canciones");