<?php

class Servicios_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
//        $this->gen_menu();
    }

    function almacenar($nombre_fun) {


        if ($nombre_fun == 'almacenarCliente') {

            $nomEmpresa = $this->input->post('nomEmpresa');
            $rutEmpresa = $this->input->post('rutEmpresa');
            $giro = $this->input->post('giro');
            $telefono = $this->input->post('telefono');
            $calle = $this->input->post('calle');
            $numero = $this->input->post('numero');
            $depto = $this->input->post('depto');
            $ciudad = $this->input->post('ciudad');
            $nombreContacto = $this->input->post('nombreContacto');
            $correoContacto = $this->input->post('correoContacto');
            $rutContacto = $this->input->post('rutContacto');
            $telefonoContacto = $this->input->post('telefonoContacto');


            $rut1 = str_replace(".", "", $rutEmpresa);
            $rutdv1 = explode('-', $rut1);


            $sql = "INSERT INTO cliente(rut,dv,nombre_rzn_social,giro,telefono) "
                    . "VALUES (" . $rutdv1[0] . ",'" . $rutdv1[1] . "','" . $nomEmpresa . "','" . $giro . "'," . $telefono . ")";
//            
            $this->db->query($sql);

            $rut2 = str_replace(".", "", $rutContacto);
            $rutdv2 = explode('-', $rut2);

            $sql = "INSERT INTO contacto (nombre,correo,contrasena,rut_cliente,rut_contacto,dv_contacto,telefono)"
                    . "VALUES ('" . $nombreContacto . "','" . $correoContacto . "','contraseña'," . $rutdv1[0] . "," . $rutdv2[0] . ",'" . $rutdv2[1] . "'," . $telefonoContacto . ")";

            try {
                $result = $this->db->query($sql);
                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }

                return 'Cliente almacenado con exito!';
            } catch (Exception $e) {
                return 'Cliente no se almaceno, presione volver y verifique los datos.';
            }
            $sql = "INSERT INTO direccion (rut_cliente,calle,numero,casa_depto,comuna,ciudad)"
                    . "VALUES (" . $rutdv1[0] . ",'" . $calle . "','" . $numero . "','" . $depto . "','" . $ciudad . "','" . $ciudad . "')";

            try {
                $result = $this->db->query($sql);
                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }

                return 'Cliente almacenado con exito!';
            } catch (Exception $e) {
                return 'Cliente no se almaceno, presione volver y verifique los datos.';
            }
        }
    }

}

?>
