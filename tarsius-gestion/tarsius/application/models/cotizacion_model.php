<?php

class Cotizacion_model extends CI_Model {

    function __construct() {
            // Call the Model constructor
            parent::__construct();
            $this->load->database();
    //        $this->gen_menu();
    }
    
    function get_last_val_secuence() {
        $this->db->select('last_value');
        $this->db->from('cotizacion_cliente');
//        $this->db->join('roles', 'us.rol = roles.id');
//        $this->db->join('rol_modulo', 'roles.id = rol_modulo.id_rol');
//        $this->db->join('modulos', 'rol_modulo.id_modulo = modulos.id');
//        $this->db->where('us.id', $this->session->userdata('id'));
        $query = $this->db->get();

        return $query->result();
    }
    
    function insert_cotizacion_cliente($name,$email,$phone,$message){
    //        $data = array(
    //            'id' => "nextval('cotizacion_cliente')",
    //            'nombre' => $name ,
    //            'correo' => $email ,
    //            'telefono' => $phone,
    //            'mensaje' => $message,
    //            'fecha' => '',
    //        );
        $sql = "INSERT INTO solicitud_cotizacion(id,nombre,correo,telefono,mensaje,fecha,estado) "
                . "VALUES (nextval('cotizacion_cliente'),'"
                . $name."','".$email."','".$phone."','".$message."',now(),'nok');";

        //$this->db->insert('solicitud_cotizacion', $data); 
        
        
        try {
            $this->db->query($sql); 
            return 'ok';
        } catch (Exception $e) {
//            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return 'nok';
        }
        
       
    }
    
    
}
