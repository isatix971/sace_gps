<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->helper('url');
        session_start();
    }

    public function index() {

        $this->load->view('index');
    }

    public function login() {
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');

        $valida = $this->account_model->validar($usuario, $password);
        $nombre = $valida->nombre;
        $id = $valida->id;

        echo $nombre;
        echo $id;

        if ($valida) {
            $datos = array(
                'username' => $usuario,
                'id' => $id,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($datos);
            redirect('/examples/home/', 'refresh');
        }
    }

    public function logout() {
        session_destroy();
        redirect('/examples/index/', 'refresh');
    }

}