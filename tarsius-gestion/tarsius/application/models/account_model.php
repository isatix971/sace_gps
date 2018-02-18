<?php

class Account_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
//        $this->gen_menu();
    }

    public function is_login() {
        if (!$this->session->userdata('logged_in')) {
            return false;
        } else {
            return true;
        }
    }

    function gen_menu() {
        $this->load->helper('menus');

        $variable = $this->get_modulos();
        if ($variable) {
            foreach ($variable as $key) {
                $config_menu[$key->id_modulo] = $key->nombre;
            }

            $global_data['menu'] = menu_ul($config_menu);
            $this->load->vars($global_data);
        }
    }

    function validar($usuario, $password) {

       

        try {
            $query = $this->db->get_where('usuario', array('correo' => $usuario, 'clave' => $password));

            $result = $query->first_row();

            if (!$result) {
                throw new Exception('error in query');
                return false;
            }

            return $result;
        } catch (Exception $e) {
            return;
        }
    }

    function get_all_info() {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function get_modulos() {
        $this->db->select('rol_modulo.id_modulo , modulos.nombre');
        $this->db->from('usuario us');
        $this->db->join('roles', 'us.rol = roles.id');
        $this->db->join('rol_modulo', 'roles.id = rol_modulo.id_rol');
        $this->db->join('modulos', 'rol_modulo.id_modulo = modulos.id');
        $this->db->where('us.id', $this->session->userdata('id'));
        $query = $this->db->get();

        return $query->result();
    }

    function test($usuario, $password) {
        $query = $this->db->get_where('prueba', array('nombre' => $usuario, 'password' => $password));
        return $query->first_row();
    }

}

?>