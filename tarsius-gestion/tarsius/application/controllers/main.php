<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
                session_start();

        $this->load->model('account_model');
        $this->load->model('cotizacion_model');
        $this->load->model('servicios_model_insert');
        $this->load->model('servicios_model_select');
        $this->load->model('servicios_model_update');
        $this->load->model('servicios_model_delete');




        $this->load->helper('url');
        
        $this->load->library('form_validation');//validador de formulario, para usar set_value
    }

    public function index() {

        if (isset($_SESSION["login"])) {


            $fechaGuardada = $_SESSION["ultimoAcceso"];
            $ahora = date("Y-n-j H:i:s");
            $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

            //comparamos el tiempo transcurrido 
            if ($tiempo_transcurrido >= 1500) {
                //si pasaron 10 minutos o más 
                session_destroy(); // destruyo la sesión 
                $this->load->view('login'); //envío al usuario a la pag. de autenticación 
                //sino, actualizo la fecha de la sesión 
            } else {
                
                //solo para cargar las vistas y los else son para cargar las funciones
                $_SESSION["ultimoAcceso"] = $ahora;
                if ($this->input->get('op') != '') {
                     
                    //inicio elemento receptor de variables POST desde verCotizaciones
                    if($this->input->get('op') == 'cotizador'){
                        if($this->input->post('sol_id')){//si viene sol_id
                            $data['postData'][0] = $this->input->post('sol_id');
                            $data['postData'][1] = $this->input->post('sol_nombre');
                            $data['postData'][2] = $this->input->post('sol_correo');
                            $data['postData'][3] = $this->input->post('sol_telefono');
                            $data['postData'][4] = $this->input->post('sol_fecha');
                            $data['postData'][5] = $this->input->post('sol_mensaje');
                        }
                    }//fin elemento receptor de variables POST desde verCotizaciones
                    
                    $data['op'] = $this->input->get('op');
//                  $this->load->view($data['op']);
                    $this->load->view('main', $data);
                } else if ($this->input->get('fun') != '') {
//                    echo "------------------------------------------------------";
                    $funcion = $this->input->get('fun');

                    $data['message'] = $this->servicios_model_insert->almacenar($funcion);
                    $data['op'] = "resultadoServicios";
                    $this->load->view('main', $data);
                } else if ($this->input->get('select') != '') {
//                    echo "------------------------------------------------------";
                    $funcion = $this->input->get('select');

                    $data['resultado'] = $this->servicios_model_select->mostrarDatos($funcion);
                    $data['op'] = $funcion;
                    $this->load->view('main', $data);
                } else if ($this->input->get('update') != '') {
//                    echo "------------------------------------------------------";
                    $funcion = $this->input->get('update');


                    echo $this->servicios_model_update->updateDatos($funcion);
                } else if ($this->input->get('delete') != '') {
//                    echo "------------------------------------------------------";
                    $funcion = $this->input->get('delete');


                    echo $this->servicios_model_delete->deleteDatos($funcion);
                } else {
                    $this->load->view('main');
                }
            }
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
//            echo "log aqui2".$email."-".$password;
            if (empty($email) || empty($password)) {
//            echo "log aqui3";
                $this->load->view('login');
            } else {
                $valida = $this->account_model->validar($email, $password);
//                echo "log aqui4";
                if ($valida != false) {
                    $_SESSION["login"] = "true";
                    $_SESSION["id"] = $valida->id;
                    $_SESSION["nombre"] = $valida->nombre;
                    $_SESSION["perfil"] = $valida->perfil;
                    $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");

                    $this->load->view('main');
                } else {
//                    echo "log aqui6";
//                    echo $_SESSION["login"];
                    $this->load->view('login');
                }
            }
        }
    }

    public function unlogin() {
        echo "logout";
        session_destroy();
        redirect('http://www.isatix.org/tarsius/', 'refresh');
    }

    public function solicitudcotizacion() {
//        echo "llegando";

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $message = $this->input->post('message');


//        echo $name.$email.$phone.$message;
        $estado = $this->cotizacion_model->insert_cotizacion_cliente($name, $email, $phone, $message);


//        $variable = $this->cotizacion_model->get_last_val_secuence();
//        print_r ($estado);
//         print_r($variable);
//        echo $variable[0]->last_value;
//        $this->load->view('main');
        redirect('http://www.aguaprana.cl/?op=' . $estado, 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */