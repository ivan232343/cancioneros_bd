<?php
include_once __DIR__ . "/main.php";
$json = json_decode($_POST['data']);
try {
    $to_change = (isset($json['to_change']) ? $json['to_change'] : 0);
    $id_user = (isset($json['id_user']) ? $json['id_user'] : 0);
    $pass_chg = (isset($json['pass_chg']) ? htmlentities($json['pass_chg']) : 0);
    $record->sp_update_passwd( $id_user, $pass_chg);
    echo "Se guardo correctamente";
} catch (Throwable $th) {
    return "no se pudo completar el guardado :( -> $th";
}
 