<?php

class Servicios_model_insert extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('utils_model');
//        $this->gen_menu();
    }

    function almacenar($nombre_fun) {

        if ($nombre_fun == 'almacenarCliente') {

            $nomEmpresa = strtolower($this->input->post('nomEmpresa'));
            $rutEmpresa = $this->input->post('rutEmpresa');
            $giro = strtolower($this->input->post('giro'));
            $telefono = $this->input->post('telefono');
            $calle = strtolower($this->input->post('calle'));
            $numero = $this->input->post('numero');
            $depto = $this->input->post('depto');
            $ciudad = strtolower($this->input->post('ciudad'));
            $nombreContacto = strtolower($this->input->post('nombreContacto'));
            $correoContacto = strtolower($this->input->post('correoContacto'));
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
            $this->db->query($sql);

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
                return false;
            }
        }
        if ($nombre_fun == 'almacenarContactoCliente') {

            $rutEmpresa = strtolower($this->input->post("nomEmpresa"));
            $nombreContacto = strtolower($this->input->post("nombreContacto"));
            $correoContacto = strtolower($this->input->post("correoContacto"));
            $rutContacto = $this->input->post("rutContacto");
            $telefonoContacto = $this->input->post("telefonoContacto");


            $rut2 = str_replace(".", "", $rutContacto);
            $rutdv2 = explode('-', $rut2);

            $sql = "INSERT INTO contacto (nombre,correo,contrasena,rut_cliente,rut_contacto,dv_contacto,telefono)"
                    . "VALUES ('$nombreContacto','$correoContacto','contraseña',$rutEmpresa,$rutdv2[0],'$rutdv2[1]',$telefonoContacto)";

            try {
                $result = $this->db->query($sql);
                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }

                return 'Contacto almacenado con exito!';
            } catch (Exception $e) {
                return false;
            }
        }


        if ($nombre_fun == 'almacenarPedido') {
            $nomEmpresa = $this->input->post("nomEmpresa");
            $rutContacto = $this->input->post("contactoCliente");
            $cantidadProducto = $this->input->post("b20");
            $maquinaCantidad = $this->input->post("mqfc");
            $dispensadorCantidad = $this->input->post("dispensador");
            $maquinaDetalle = $this->input->post("mqfcDetalle");
            $fechaEstimada = $this->input->post("fechaEstimada");

//            deprecado
//            $nfactura = $this->input->post("nfactura");
//            $nguia = $this->input->post("nguia");
            $nfactura = 0;
            $nguia = 0;

            //valores por defecto que pueden ser modificados para botellon b20
            $idProducto = 1;
            $valorProducto = 2400;
            //

            $estado = "pendiente";

            $sql = "INSERT INTO pedido (id,rut_contacto_cliente,fecha_pedido,fecha_estimada,fecha_entrega,factura,guia,estado)"
                    . "VALUES (nextval('pedido_seq')," . $rutContacto . ",now(),'" . $fechaEstimada . "',null,$nfactura,$nguia,'$estado')";

            $result_seq = $this->utils_model->get_last_pedido();
            $sql2 = "INSERT INTO pedido_producto (id_pedido,precio_unidad,cantidad,id_producto,detalle)"
                    . "VALUES ($result_seq,$valorProducto,$cantidadProducto,$idProducto,' ')";
            try {
                $result = $this->db->query($sql);
                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }
                $result = $this->db->query($sql2);
                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }
                if ($maquinaCantidad != '') {
                    $idProducto = 2;
                    $valorProducto = 100000;
                    $sql3 = "INSERT INTO pedido_producto (id_pedido,precio_unidad,cantidad,id_producto,detalle)"
                            . "VALUES ($result_seq,$valorProducto,$cantidadProducto,$idProducto,'$maquinaDetalle')";
                    $result = $this->db->query($sql3);
                    if (!$result) {
                        throw new Exception('error in query');
                        return false;
                    }
                }
                if ($dispensadorCantidad != '') {
                    $idProducto = 3;
                    $valorProducto = 5000;
                    $sql3 = "INSERT INTO pedido_producto (id_pedido,precio_unidad,cantidad,id_producto,detalle)"
                            . "VALUES ($result_seq,$valorProducto,$dispensadorCantidad,$idProducto,' ')";
                    $result = $this->db->query($sql3);
                    if (!$result) {
                        throw new Exception('error in query');
                        return false;
                    }
                }

                return "Pedido almacenado";
            } catch (Exception $e) {
                return false;
            }
        }

        if ($nombre_fun == 'almacenarUsuario') {

            $nombreContacto = $this->input->post("nombreContacto");
            $correoContacto = $this->input->post("correoContacto");
            $clave = $this->input->post("clave");
            $perfil = $this->input->post("perfil");


            $sql = "INSERT INTO usuario (id,nombre,correo,clave,perfil)
                VALUES (nextval('usuarios_id_seq'::regclass),'$nombreContacto','$correoContacto','$clave'"
                    . ",'$perfil')";
            try {
                $result = $this->db->query($sql);
                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }

                return 'Usuario almacenado con exito!';
            } catch (Exception $e) {
                return false;
            }
        }

        if ($nombre_fun == 'almacenarDespacho') {

            $idDespacho = $this->input->post("idDespacho");
            $b20devueltos = $this->input->post("b20devueltos");
            $comentarios = $this->input->post("comentarios");
            $estadopago = $this->input->post("estadopago");
//            id de producto es 1 que corresponde a los botellones de 20L

            $sql = "INSERT INTO pago_devolucion_envase (id,id_pedido,id_producto,cantidad_devuelta,fecha_devolucion,comentarios,estado_pago)
	VALUES (nextval('devolucion_envase_seq'::regclass),$idDespacho,1,$b20devueltos,now(),'$comentarios'"
                    . ",'$estadopago')";
            $sql_update = "UPDATE pedido SET fecha_entrega=now(), estado='entregado' WHERE id='$idDespacho'";

            try {
                $result = $this->db->query($sql);
                $result_update = $this->db->query($sql_update);

                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }
                if (!$result_update) {
                    throw new Exception('error in query');
                    return false;
                }

                return 'Pedido finalizado correctamente';
            } catch (Exception $e) {
                return false;
            }
        }

        if ($nombre_fun == 'almacenarStockManana') {

            $b20vacios  = $this->input->post("envVacios");
            $b20llenos = $this->input->post("envLLenos");

            $idLLenador = 1;
            
            $sql = "INSERT INTO stock_llenado (id_llenador,manana_tarde,llenos,vacios,fecha,llenado_diario) "
                    . "VALUES ($idLLenador,'manana',$b20llenos,$b20vacios,now(),0)";

            try {
                $result = $this->db->query($sql);

                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }
                

                return 'Stock almacenado correctamente';
            } catch (Exception $e) {
                return false;
            }
        }
        if ($nombre_fun == 'almacenarStockTarde') {

            $b20vacios  = $this->input->post("envVacios");
            $b20llenos = $this->input->post("envLLenos");
            $llenado = $this->input->post("llenado");

            $idLLenador = 1;
            
            $sql = "INSERT INTO stock_llenado (id_llenador,manana_tarde,llenos,vacios,fecha,llenado_diario) "
                    . "VALUES ($idLLenador,'tarde',$b20llenos,$b20vacios,now(),$llenado)";

            try {
                $result = $this->db->query($sql);

                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }
                

                return 'Stock almacenado correctamente';
            } catch (Exception $e) {
                return false;
            }
        }
        if ($nombre_fun == 'almacenarCargaDescarga') {

            $b20vacios  = $this->input->post("envVacios");
            $b20llenos = $this->input->post("envLLenos");
            $usuario = $this->input->post("usuario");

            $idLLenador = 1;
            $id_producto =1;
            
//            $sql = "INSERT INTO car (id_llenador,manana_tarde,llenos,vacios,fecha,llenado_diario) "
//                    . "VALUES ($idLLenador,'tarde',$b20llenos,$b20vacios,now(),$llenado)";
            
            $sql = "INSERT INTO carga_descarga (fecha,id_llenador,id_usuario,id_producto,llenos,vacios)"
                    . "VALUES (now(),$idLLenador,$usuario,$id_producto,$b20llenos,$b20vacios)";

            try {
                $result = $this->db->query($sql);

                if (!$result) {
                    throw new Exception('error in query');
                    return false;
                }
                

                return 'Stock almacenado correctamente';
            } catch (Exception $e) {
                return false;
            }
        }

        //envia mensaje 
        if ($nombre_fun == 'envioCotizacion') {

//            este metodo se debe completar para almacenar una cotizacion realizada.

            return "Solicitud o cotizacion realizada";
        }
    }

}

?>
