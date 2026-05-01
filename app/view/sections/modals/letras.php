<?php 
#enviar como json :D
$get_lyrics = $record->sp_g_full_letra($_POST["identifier"]); 
$array = [
    "full_lyric"=>nl2br($get_lyrics["letra"]),
    "title_lyric"=>$get_lyrics["titulo"]
];
echo json_encode($array,JSON_UNESCAPED_UNICODE);
?>
