<?php
include_once __DIR__ . "/main.php";
try {
    // var_dump($_POST);
    $is_titular = (isset($_POST['es_titular']) ? $_POST['es_titular'] : 0);
    $is_cross = (isset($_POST['is_cross']) ? $_POST['is_cross'] : 0);
    $is_tificado = (isset($_POST['is_tificado']) ? $_POST['is_tificado'] : 0);
    $nombre = $_POST['nombre_cli'];
    $dni = $_POST['dni_cli'];
    $tel_referencia = $_POST['tel_referencia'];
    $tel_consulta = $_POST['tel_consulta'];
    $motivo = $_POST['motivo_cli'];
    $correo = (isset($_POST['correo_cli']) ? $_POST['correo_cli'] :""); 
    $ani = $_POST['ani_call'];
    $conmid = $_POST['conmid_call'];
    $codigo_nac = $_POST['nac_call'];
    $cod_atencion = $_POST['cod_ate_call'];
    $observaciones = $_POST['observaciones_cli'];
    $time_stamp = $_POST['time_stamp'];
    $record->sp_create_cliente(
        $nombre, 
        $dni, 
        $observaciones, 
        $motivo,
        $is_titular,
        $tel_referencia,
        $tel_consulta,
        $correo,
        $is_cross, 
        $is_tificado,
        $ani,
        $conmid,
        $codigo_nac,
        $cod_atencion,
        $time_stamp
    );
} catch (Throwable $th) {
    return "no se pudo completar el guardado :( -> $th";
}
 