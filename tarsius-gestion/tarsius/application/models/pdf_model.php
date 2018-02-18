<?php
defined("BASEPATH") OR die("El acceso al script no está permitido");
 
class Pdf_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function getProvincias()
    {
        $query = $this->db->get('provincias_es');
        return $query->result();
    }
}
/* End of file pdf_model.php */
/* Location: ./application/models/pdf_model.php */