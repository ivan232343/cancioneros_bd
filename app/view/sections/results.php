<?php 
       if ($_POST['post']!=""  && is_file(__DIR__."/$getter/".$_POST['post'].".php")) {
            require_once(__DIR__."/$getter/".$_POST['post'].".php") ;
       }else{
        return "no se pudo encontrar la solicitud";
       }
