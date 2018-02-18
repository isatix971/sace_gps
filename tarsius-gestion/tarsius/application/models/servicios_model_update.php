<?php

class Servicios_model_update extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('utils_model');
    }

    function updateDatos($nombre_fun) {

        if ($nombre_fun == 'updateDespacho') {

            
            $idpedido = $this->input->post('idpedido');
            
            
            
            $iddespachador = $this->input->post('iddespachador');
            $query = $this->db->query("UPDATE pedido SET estado='despacho' WHERE id='$idpedido'");

            $query = $this->db->query("INSERT INTO despacho (id_pedido,id_despachador)"
                    . "VALUES ($idpedido ,$iddespachador)");
            
//            "UPDATE pedido SET estado='despacho' WHERE id='$idpedido'";

//            foreach ($query->result_array() as $row) {
//                $val= $row['nombre'];
////        echo $row['name'];
////        echo $row['email'];
//            }

            return "ok";
        }
      
    }

}
