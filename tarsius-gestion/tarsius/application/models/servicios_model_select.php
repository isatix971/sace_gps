<?php

class Servicios_model_select extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('utils_model');
    }

    function mostrarDatos($nombre_fun) {

        if ($nombre_fun == 'verCotizaciones') {

            $query = $this->db->query('SELECT * FROM solicitud_cotizacion order by id desc');

            return $query;
        }
        if ($nombre_fun == 'verPedidos') {

            $query = $this->db->query("select pe.id,nombre_rzn_social,rut,dv, to_char(fecha_pedido,'DD-MM-YYYY') fecha_pedido, to_char(fecha_estimada,'DD-MM-YYYY') fecha_estimada,
                cantidad, id_producto ,pr.nombre, detalle , estado
                from cliente cl, contacto co, pedido pe, pedido_producto pp, producto pr
                where cl.rut = co.rut_cliente and co.rut_contacto = pe.rut_contacto_cliente and pe.id = pp.id_pedido and pp.id_producto = pr.id
                order by id_pedido, fecha_pedido");


            return $query;
        }
        if ($nombre_fun == 'verFacturas') {
            $nomEmpresa = $this->input->post("nomEmpresa");
            if ($nomEmpresa != '') {
                $query = $this->db->query("select cli.nombre_rzn_social,
                cli.rut, cli.dv,con.nombre,pdd.id, to_char(pdd.fecha_pedido,'DD-MM-YYYY - HH:mi') as fecha_pedido,
                to_char(pdd.fecha_entrega,'DD-MM-YYYY - HH:mi') as fecha_entrega,pdd.factura, pdd.guia,pde.estado_pago
        from pedido pdd, contacto con, cliente cli, pago_devolucion_envase pde
        where pdd.rut_contacto_cliente = con.rut_contacto and
        cli.rut = con.rut_cliente and pde.id_pedido = pdd.id
        and cli.rut =" . $nomEmpresa);
            } else {
                $query = $this->db->query("select cli.nombre_rzn_social,
                cli.rut, cli.dv,con.nombre,pdd.id, to_char(pdd.fecha_pedido,'DD-MM-YYYY - HH:mi') as fecha_pedido,
                to_char(pdd.fecha_entrega,'DD-MM-YYYY - HH:mi') as fecha_entrega,pdd.factura, pdd.guia,pde.estado_pago
        from pedido pdd, contacto con, cliente cli, pago_devolucion_envase pde
        where pdd.rut_contacto_cliente = con.rut_contacto and
        cli.rut = con.rut_cliente and pde.id_pedido = pdd.id");
            }

            return $query;
        }

        if ($nombre_fun == 'verEnvasesDevueltos') {
//            realiza diferencia de envases 
//select *,(env_entregados-env_devueltos) as diferencia_envases  from (
//select pp.id_producto,sum(pp.cantidad) as env_entregados  from pedido pdd, pedido_producto pp,contacto con, cliente cli
//where pdd.id = pp.id_pedido and pdd.estado = 'entregado' and
//pdd.rut_contacto_cliente = con.rut_contacto and con.rut_cliente = cli.rut
//and cli.rut = 98437098 group by pp.id_producto) as entregas,
//
//(select id_producto, sum(cantidad_devuelta) as env_devueltos from pago_devolucion_envase pde, pedido pdd, contacto con, cliente cli
//where pde.id_pedido = pdd.id and pdd.rut_contacto_cliente = con.rut_contacto
//and con.rut_cliente = cli.rut and cli.rut = 98437098 group by id_producto) as devolucion
//
//where entregas.id_producto = devolucion.id_producto;
        }
    }

}
