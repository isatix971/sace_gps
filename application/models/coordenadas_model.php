<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coordenadas_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Saca sólo 1 coordenada, validar el modelo de datos.
     * @return la coordenada del unico equipo
     */
    function recuperarLastCoord(){
        
        //$query = $this->db->get('coordenadas'); //enchular la query para que saque el valor preciso //comentada porque sacaba todas las coordenadas(en teoría)
        
        $this->db->from('coordenadas');
        $this->db->order_by("id", "desc"); //no logré mirar la base de datos, así que no se si hay ID o algo. 
        $this->db->limit(1);
        $query = $this->db->get(); 
        
        return $query->result();
    }
}
?>