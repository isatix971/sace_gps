<?php

class Servicios_model_delete extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function deleteDatos($nombre_fun) {

        if ($nombre_fun == 'deleteCotizacion') {

            
            $idcotizacion = $this->input->post('idcotizacion');

            $query = $this->db->query("DELETE FROM solicitud_cotizacion WHERE id=$idcotizacion");

          

            return "ok";
        }
      
    }

}
