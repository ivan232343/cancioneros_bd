<?php
class model_canciones
{
    private $db;
    public function __construct()
    {
        $this->db = conexion::con();
        
    }
    public function sp_create_cliente($nombre,$dni,$observaciones,$motivo,$is_titular,$tel_referencia,$tel_consulta,$correo,$is_cross,$is_tificado,$ani,$conmid,$codigo_nac,$cod_atencion,$time_stamp) 
    {
        $consulta = $this->db->prepare("CALL sp_create_cliente('$nombre','$dni','$observaciones','$motivo','$is_titular','$tel_referencia','$tel_consulta','$correo','$is_cross','$is_tificado','$ani','$conmid','$codigo_nac','$cod_atencion','$time_stamp');");
        $result = $consulta->execute();
        return $result;
    }
    public function sp_g_count_canciones()
    {
        $consulta = $this->db->prepare("CALL sp_g_count_canciones();");
        $result = $consulta->execute();
        $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
        // return "ok";
        return $result;
    }
    public function sp_g_all_canciones()
    {
        $consulta = $this->db->prepare("CALL sp_g_all_canciones()");
        $consulta->execute();
        $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function sp_g_full_letra($a)
    { 
        $consulta = $this->db->prepare("CALL sp_g_full_letra('$a')"); 
        $result = $consulta->execute(); 
        $result = $consulta->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function sp_get_detail_pass($a)
    { 
        $consulta = $this->db->prepare("CALL sp_get_detail_pass('$a')"); 
        $result = $consulta->execute(); 
        $result = $consulta->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function sp_get_pass($a)
    { 
        $consulta = $this->db->prepare("CALL sp_get_pass('$a')"); 
        $result = $consulta->execute(); 
        $result = $consulta->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    public function sp_update_passwd($id_user,$pass_chg) 
    {
        $consulta = $this->db->prepare("CALL sp_update_passwd('$id_user','$pass_chg');");
        $result = $consulta->execute();
        return $result;
    }
}
