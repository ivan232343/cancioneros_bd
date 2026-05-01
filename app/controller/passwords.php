<?php

class passwords
{
    public function start()
    {
        call_model("calls_model");
        $record = new calls_model();
        $passwords = $record->sp_get_pass_user();
        call_vistas("clientes/pass",$passwords);
    }
}
