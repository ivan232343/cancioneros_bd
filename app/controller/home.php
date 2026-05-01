<?php
class home
{
    public function start()
    {
        session_start();
        call_vistas("base");
    }
 
}