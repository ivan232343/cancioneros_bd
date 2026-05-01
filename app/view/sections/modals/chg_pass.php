<?php 
#enviar como json :D
$get_pass = $record->sp_get_detail_pass($_POST["identifier"]); 
$array = [
    "nombre_app"=>$get_pass["name_app"] ,
    "cod_user"=>$get_pass["cod_user"] ,
    "password_new" =>generator(),
    "identifier" => $_POST["identifier"],
    "pass_to_change" => $get_pass["id_password"],
    "id_usu_mant" =>$get_pass["id_user"]
];
echo json_encode($array,JSON_UNESCAPED_UNICODE);
?>
