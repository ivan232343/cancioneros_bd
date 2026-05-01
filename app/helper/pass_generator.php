<?php
function generator($letters = 4, $simbolos = 4, $numbers = 4)
{
    $letras = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
        'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];
    $numeros = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $symbols = ['#', '$', '%', '&', '(', ')', '=', '@', "*", '^'];
    $strength = $letters + $simbolos + $numbers;
    $chars = [$letras, $numeros, $symbols];
    // $pswd = [];
    $password = "";
    for ($i = 0; $i < $strength; $i++) {
        $cursorx = rand(0, 2);
        $cursory = rand(0, count($chars[$cursorx])-1);
        $password.= $chars[$cursorx][$cursory];
    }
    return $password;
}
