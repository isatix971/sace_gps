<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
        session_start();

//        $this->load->model('account_model');

        $this->load->helper('url');

        $this->load->library('form_validation'); //validador de formulario, para usar set_value
    }
    
    /**
     * Extendiendo el controlador para datos, que no tenga que construir HTML.
     * http://192.81.211.131/sace_gps/index.php/main/data?que=coordenadas
     */
    public function data(){
        $_SESSION["login"] = "true";
        $_SESSION["nombre"] = "Super User";
        $_SESSION["perfil"] = "Administrador";
        
        $quedata = $this->input->get('que');
        
        if($quedata == "coordenadas"){
            $this->load->model('coordenadas_model');//cargo el modelo ver Coordenadas_model.php
            
            $data = $this->coordenadas_model->recuperarLastCoord(); 
            $responsedata = json_encode($data);
            
            /* //comentada respuesta utilizando clase output
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($data));
            //no está procesado el potencial error de mysql
            $this->output->_display();
             */ //probar a ver que tal
            
            //echo json_encode($data); //a ver que responde
            var_dump($responsedata);
            return $responsedata;
        }
        else{
            return "NO SABE BUSCAR NADA MÁS"; 
        }
    }

    public function index() {
        $_SESSION["login"] = "true";
        $_SESSION["nombre"] = "Super User";
        $_SESSION["perfil"] = "Administrador";
        $funcion = $this->input->get('select');

        if ($funcion != '') {
            $data['op'] = $funcion;
            $this->load->view('base_main', $data);
        } else {
            $this->load->view('base_main');
        }


//        if (isset($_SESSION["login"])) {
//
//
//            $fechaGuardada = $_SESSION["ultimoAcceso"];
//            $ahora = date("Y-n-j H:i:s");
//            $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
//
//            //comparamos el tiempo transcurrido 
//            if ($tiempo_transcurrido >= 1500) {
//                //si pasaron 10 minutos o más 
//                session_destroy(); // destruyo la sesión 
//                $this->load->view('login'); //envío al usuario a la pag. de autenticación 
//                //sino, actualizo la fecha de la sesión 
//            } else {
//
//                //solo para cargar las vistas y los else son para cargar las funciones
//                $_SESSION["ultimoAcceso"] = $ahora;
//                if ($this->input->get('op') != '') {
//
//                    //inicio elemento receptor de variables POST desde verCotizaciones
//                    if ($this->input->get('op') == 'cotizador') {
//                        if ($this->input->post('sol_id')) {//si viene sol_id
//                            $data['postData'][0] = $this->input->post('sol_id');
//                            $data['postData'][1] = $this->input->post('sol_nombre');
//                            $data['postData'][2] = $this->input->post('sol_correo');
//                            $data['postData'][3] = $this->input->post('sol_telefono');
//                            $data['postData'][4] = $this->input->post('sol_fecha');
//                            $data['postData'][5] = $this->input->post('sol_mensaje');
//                        }
//                    }//fin elemento receptor de variables POST desde verCotizaciones
//
//                    $data['op'] = $this->input->get('op');
//                    $this->load->view('main', $data);
//                } else if ($this->input->get('fun') != '') {
////                    echo "------------------------------------------------------";
//                    $funcion = $this->input->get('fun');
//
//                    $data['message'] = $this->servicios_model_insert->almacenar($funcion);
//                    $data['op'] = "resultadoServicios";
//                    $this->load->view('main', $data);
//                }else if ($this->input->get('funAjax') != '') {
////                    echo "------------------------------------------------------";
//                    $funcion = $this->input->get('funAjax');
//
//                    echo $this->servicios_model_insert->almacenar($funcion);
//                    
//                } 
//                else if ($this->input->get('select') != '') {
////                    echo "------------------------------------------------------";
//                    $funcion = $this->input->get('select');
//
//                    $data['resultado'] = $this->servicios_model_select->mostrarDatos($funcion);
//                    $data['op'] = $funcion;
//                    $this->load->view('main', $data);
//                } else if ($this->input->get('update') != '') {
////                    echo "------------------------------------------------------";
//                    $funcion = $this->input->get('update');
//
//
//                    echo $this->servicios_model_update->updateDatos($funcion);
//                } else if ($this->input->get('delete') != '') {
////                    echo "------------------------------------------------------";
//                    $funcion = $this->input->get('delete');
//
//
//                    echo $this->servicios_model_delete->deleteDatos($funcion);
//                } else {
//                    $this->load->view('main');
//                }
//            }
//        } else {
//            $email = $this->input->post('email');
//            $password = $this->input->post('password');
////            echo "log aqui2".$email."-".$password;
//            if (empty($email) || empty($password)) {
////            echo "log aqui3";
//                $this->load->view('login');
//            } else {
//                $valida = $this->account_model->validar($email, $password);
////                echo "log aqui4";
//                if ($valida != false) {
//                    $_SESSION["login"] = "true";
//                    $_SESSION["id"] = $valida->id;
//                    $_SESSION["nombre"] = $valida->nombre;
//                    $_SESSION["perfil"] = $valida->perfil;
//                    $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
//
//                    if ($valida->perfil == "oficina") {
//                        $data['op'] = "puntoVenta";
//                        $this->load->view('main', $data);
//                    }
//                    else{
//                        $this->load->view('main');
//                    }
//                } else {
////                    echo "log aqui6";
////                    echo $_SESSION["login"];
//                    $this->load->view('login');
//                }
//            }
//        }
    }

    public function unlogin() {
        echo "logout";
        session_destroy();
        redirect('/', 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */