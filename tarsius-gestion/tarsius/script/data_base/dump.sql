--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cliente (
    rut numeric NOT NULL,
    dv character(1) NOT NULL,
    nombre_rzn_social text NOT NULL,
    giro text,
    telefono integer
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- Name: TABLE cliente; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE cliente IS 'almacena los datos de los clientes';


--
-- Name: COLUMN cliente.rut; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cliente.rut IS 'rut del cliente';


--
-- Name: COLUMN cliente.dv; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cliente.dv IS 'dígito verificador';


--
-- Name: COLUMN cliente.nombre_rzn_social; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cliente.nombre_rzn_social IS 'nombre o razon social';


--
-- Name: contacto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE contacto (
    nombre text NOT NULL,
    correo text,
    contrasena text NOT NULL,
    rut_cliente integer,
    rut_contacto integer NOT NULL,
    dv_contacto character(1) NOT NULL,
    telefono integer
);


ALTER TABLE public.contacto OWNER TO postgres;

--
-- Name: cotizacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cotizacion (
    id integer NOT NULL,
    fecha_coti date NOT NULL,
    fecha_vigencia date,
    nombre_cliente text NOT NULL,
    rut_cliente integer,
    dv_cliente character(1),
    correo text,
    telefono text,
    vigencia character varying(10) DEFAULT 'si'::character varying
);


ALTER TABLE public.cotizacion OWNER TO postgres;

--
-- Name: cotizacion_cliente; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cotizacion_cliente
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cotizacion_cliente OWNER TO postgres;

--
-- Name: cotizacion_cliente; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cotizacion_cliente', 91, true);


--
-- Name: cotizacion_producto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cotizacion_producto (
    id_cotizacion integer NOT NULL,
    precio_unidad numeric(15,2) NOT NULL,
    cantidad integer NOT NULL,
    id_producto integer NOT NULL
);


ALTER TABLE public.cotizacion_producto OWNER TO postgres;

--
-- Name: despacho; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE despacho (
    id_pedido integer,
    id_despachador integer
);


ALTER TABLE public.despacho OWNER TO postgres;

--
-- Name: devolucion_envase; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE devolucion_envase (
    id integer,
    id_cliente integer,
    id_contacto integer,
    id_producto integer,
    cantidad_devuelta integer,
    fecha_devolucion timestamp without time zone
);


ALTER TABLE public.devolucion_envase OWNER TO postgres;

--
-- Name: direccion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE direccion (
    rut_cliente integer NOT NULL,
    calle text NOT NULL,
    numero character varying,
    casa_depto text,
    comuna text,
    ciudad text DEFAULT 'Melipilla'::text
);


ALTER TABLE public.direccion OWNER TO postgres;

--
-- Name: pedido; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pedido (
    id integer NOT NULL,
    rut_contacto_cliente integer,
    fecha_pedido timestamp without time zone,
    fecha_estimada timestamp without time zone,
    fecha_entrega timestamp without time zone,
    factura integer,
    guia integer,
    estado character varying
);


ALTER TABLE public.pedido OWNER TO postgres;

--
-- Name: pedido_producto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pedido_producto (
    id_pedido integer NOT NULL,
    precio_unidad numeric(15,2) NOT NULL,
    cantidad integer NOT NULL,
    id_producto integer NOT NULL,
    detalle character varying
);


ALTER TABLE public.pedido_producto OWNER TO postgres;

--
-- Name: pedido_producto_cantidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pedido_producto_cantidad_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.pedido_producto_cantidad_seq OWNER TO postgres;

--
-- Name: pedido_producto_cantidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pedido_producto_cantidad_seq OWNED BY pedido_producto.cantidad;


--
-- Name: pedido_producto_cantidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pedido_producto_cantidad_seq', 1, false);


--
-- Name: pedido_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pedido_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.pedido_seq OWNER TO postgres;

--
-- Name: pedido_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pedido_seq', 21, true);


--
-- Name: perfil; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil (
    id integer NOT NULL,
    nombre character varying,
    descripcion character varying
);


ALTER TABLE public.perfil OWNER TO postgres;

--
-- Name: perfil_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_id_seq OWNER TO postgres;

--
-- Name: perfil_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfil_id_seq OWNED BY perfil.id;


--
-- Name: perfil_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('perfil_id_seq', 4, true);


--
-- Name: perfil_menu; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil_menu (
    perfil integer NOT NULL,
    menu_id integer,
    menu_html character varying
);


ALTER TABLE public.perfil_menu OWNER TO postgres;

--
-- Name: perfil_submenu; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil_submenu (
    submenu integer NOT NULL,
    menu_id integer,
    submenu_html character varying
);


ALTER TABLE public.perfil_submenu OWNER TO postgres;

--
-- Name: producto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE producto (
    id integer NOT NULL,
    nombre text NOT NULL,
    descripcion text
);


ALTER TABLE public.producto OWNER TO postgres;

--
-- Name: solicitud_cotizacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE solicitud_cotizacion (
    id integer NOT NULL,
    nombre character varying,
    correo character varying,
    telefono character varying,
    mensaje character varying,
    fecha timestamp without time zone,
    estado character varying
);


ALTER TABLE public.solicitud_cotizacion OWNER TO postgres;

--
-- Name: telefono; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE telefono (
    rut_cliente integer NOT NULL,
    numero text NOT NULL,
    tipo text
);


ALTER TABLE public.telefono OWNER TO postgres;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    id integer NOT NULL,
    nombre character varying(100),
    correo character varying(50),
    clave character varying(50),
    perfil character varying
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuario.id;


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_id_seq', 2, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfil ALTER COLUMN id SET DEFAULT nextval('perfil_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cliente VALUES (16536391, '4', 'francisco vergara', NULL, NULL);
INSERT INTO cliente VALUES (345345, '6', 'dhfgd', 'sdgfdsg', 3465);
INSERT INTO cliente VALUES (45545, '6', 'sadf', 'rty', 463);
INSERT INTO cliente VALUES (2345, '4', 'rrty', '6435', 45);
INSERT INTO cliente VALUES (98, '9', 'sjgfhj', 'khjkg', 67);
INSERT INTO cliente VALUES (9893, '4', 'sjgfhj', 'khjkg', 67);
INSERT INTO cliente VALUES (5674, '3', 'sjgfhj', 'khjkg', 67);
INSERT INTO cliente VALUES (234563, '4', 'sdfgsdf', 'fdhfg', 2345);
INSERT INTO cliente VALUES (6457478, '3', 'otro jk kjkl hlzdjfgh', 'dsfg', 5456);
INSERT INTO cliente VALUES (7474, '7', 'palote', 'dksl', 88888);
INSERT INTO cliente VALUES (98437098, '3', 'cliente', 'lkfjgk', 980987);
INSERT INTO cliente VALUES (74387, '5', 'esto es otro', 'dfghfdgh', 567567);
INSERT INTO cliente VALUES (88888888, '8', 'pedro yo no fui', 'cantante', 9);
INSERT INTO cliente VALUES (87675748, '8', 'este es malo', 'weno weno', 983489489);
INSERT INTO cliente VALUES (884444555, '5', 'secuencia erer', '2345423454', 23454235);
INSERT INTO cliente VALUES (24780847, '7', 'lisbeth', 'tecnologia', 952506057);
INSERT INTO cliente VALUES (7777777, '7', 'humbertito', 'humer', 7777);


--
-- Data for Name: contacto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO contacto VALUES ('fhdg', 'fdgh@fdg', 'contraseña', 345345, 4, '5', 4356);
INSERT INTO contacto VALUES ('dfghfd', 'fdgh@fdg', 'contraseña', 45545, 4563, '5', 3456);
INSERT INTO contacto VALUES ('3456', 'fdgh@fdg', 'contraseña', 2345, 546, '5', 76547);
INSERT INTO contacto VALUES ('56876', 'fdgh@fdg', 'contraseña', 98, 678, '5', 6785678);
INSERT INTO contacto VALUES ('56876', 'fdgh@fdg', 'contraseña', 5674, 789, '6', 6785678);
INSERT INTO contacto VALUES ('23ergds', 'sdg@sdfg', 'contraseña', 234563, 65, '3', 555);
INSERT INTO contacto VALUES ('sdgfdsf', 'sdfg@dg', 'contraseña', 6457478, 23423423, '4', 46356);
INSERT INTO contacto VALUES ('contacto', 'david@fldl', 'contraseña', 98437098, 34532, '4', 3564);
INSERT INTO contacto VALUES ('contacto nuevo', 'asdfß@df', '', 16536391, 43636456, '5', 3466);
INSERT INTO contacto VALUES ('ttttrrr', 'sdfg@dg', 'contraseña', 16536391, 76876, '9', 4574567);
INSERT INTO contacto VALUES ('lalala', 'david@fldl', 'contraseña', 74387, 45, '6', 67876);
INSERT INTO contacto VALUES ('contacto', 'sdfg@dg', 'contraseña', 74387, 56755, '7', 456546);
INSERT INTO contacto VALUES ('eeeeee', 'david@fldl', 'contraseña', 234563, 65746745, '7', 45745756);
INSERT INTO contacto VALUES ('el mero malo', 'lakd@jkdk', 'contraseña', 87675748, 98456979, '3', 453654);
INSERT INTO contacto VALUES ('el mentira', 'hkdjhk@ñdlkf', 'contraseña', 88888888, 89659869, '8', 345453345);
INSERT INTO contacto VALUES ('asdf', 'sdf@xn--kldf-fqa.f', 'contraseña', 16536391, 3425523, '4', 2345245);
INSERT INTO contacto VALUES ('dfgdfg', 'dfgdf@ddg', 'contraseña', 7474, 23454645, '6', 34546456);
INSERT INTO contacto VALUES ('uuututututu', 'tutyuety|@asdf', 'contraseña', 7474, 56354, '6', 3454654);
INSERT INTO contacto VALUES ('dsdfsd', 'sdf@xn--kldf-fqa.f', 'contraseña', 884444555, 234, '5', 34345);
INSERT INTO contacto VALUES ('ana', 'sdasdasd@sss.com', 'contraseña', 24780847, 24780847, '7', 952506057);
INSERT INTO contacto VALUES ('gil gil', 'sdasdasewd@sss.com', 'contraseña', 7777777, 3344, '4', 444);


--
-- Data for Name: cotizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cotizacion VALUES (1, '2016-07-22', '2016-07-22', 'ret', 1, '2', 'ergd', 'sdfg', 'si');
INSERT INTO cotizacion VALUES (3, '2016-07-25', '2016-07-25', 'asdf', 3, '2', 'dg', 'asdf', 'si');


--
-- Data for Name: cotizacion_producto; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: despacho; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO despacho VALUES (2, 1);
INSERT INTO despacho VALUES (10, 4);
INSERT INTO despacho VALUES (14, 4);
INSERT INTO despacho VALUES (11, 4);
INSERT INTO despacho VALUES (4, 4);
INSERT INTO despacho VALUES (12, 4);
INSERT INTO despacho VALUES (17, 1);
INSERT INTO despacho VALUES (18, 4);
INSERT INTO despacho VALUES (19, 1);
INSERT INTO despacho VALUES (20, 4);
INSERT INTO despacho VALUES (10, 1);
INSERT INTO despacho VALUES (21, 1);


--
-- Data for Name: devolucion_envase; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: direccion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO direccion VALUES (345345, 'hdfghd', '45', '45', 'dfgh', 'dfgh');
INSERT INTO direccion VALUES (45545, '456', '456', '456', 'fdhgfdh', 'fdhgfdh');
INSERT INTO direccion VALUES (2345, 'dhf', '455', '45', '4356', '4356');
INSERT INTO direccion VALUES (98, 'fghj', '67', '678', '678', '678');
INSERT INTO direccion VALUES (5674, 'fghj', '67', '678', '678', '678');
INSERT INTO direccion VALUES (234563, '', '', '', '', '');
INSERT INTO direccion VALUES (6457478, 'dsfg', '34', '345', 'bfdghfg', 'bfdghfg');
INSERT INTO direccion VALUES (98437098, 'dlfgj', '98', '88', 'khdg', 'khdg');
INSERT INTO direccion VALUES (74387, 'sdfg', '34', '67', 'sdfgsd', 'sdfgsd');
INSERT INTO direccion VALUES (87675748, 'asdfgfdg', '345', '345', 'sdfhkhg', 'sdfhkhg');
INSERT INTO direccion VALUES (884444555, 'dfsgsdfg', '34', '0', 'stgo', 'stgo');
INSERT INTO direccion VALUES (7777777, 'dffdddd', '34', '4', 'gg', 'gg');


--
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO pedido VALUES (6, 23423423, '2016-08-08 17:54:49.70078', '2016-08-30 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (8, 23423423, '2016-08-10 19:02:36.212066', '2016-08-27 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (13, 678, '2016-08-12 17:34:11.646086', '2016-08-18 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (2, 789, '2016-08-08 16:41:43.011136', '2016-10-08 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (14, 76876, '2016-08-17 16:49:56.702351', '2016-08-30 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (16, 89659869, '2016-09-08 08:50:54.770646', '2016-09-24 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (11, 4563, '2016-08-11 09:57:29.604929', '2016-08-27 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (12, 65, '2016-08-11 10:03:18.731993', '2016-08-20 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (7, 23423423, '2016-08-08 17:55:10.691231', '2016-08-21 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (1, 65, '2016-08-08 16:29:41.604594', '2016-10-08 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (5, 789, '2016-08-08 17:51:06.042422', '2016-08-31 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (3, 789, '2016-08-08 16:48:12.161094', '2016-08-18 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (9, 23423423, '2016-08-10 19:06:16.90122', '2016-08-27 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (4, 789, '2016-08-08 17:33:27.052621', '2016-08-31 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (15, 76876, '2016-08-17 16:52:48.743111', '2016-08-21 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (17, 23454645, '2016-12-03 17:23:28.452272', '2016-12-22 00:00:00', NULL, NULL, NULL, 'pendiente');
INSERT INTO pedido VALUES (18, 76876, '2016-12-09 15:19:27.617627', '2016-12-11 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (19, 23423423, '2016-12-09 16:49:21.845567', '2016-12-16 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (20, 24780847, '2016-12-12 23:23:38.204846', '2016-12-14 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (10, 23423423, '2016-08-10 19:08:19.349469', '2016-08-27 00:00:00', NULL, NULL, NULL, 'despacho');
INSERT INTO pedido VALUES (21, 3425523, '2017-02-09 19:43:44.239955', '2017-02-13 00:00:00', NULL, NULL, NULL, 'despacho');


--
-- Data for Name: pedido_producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO pedido_producto VALUES (2, 2400.00, 34, 1, NULL);
INSERT INTO pedido_producto VALUES (4, 2400.00, 45, 1, NULL);
INSERT INTO pedido_producto VALUES (6, 2400.00, 666, 1, NULL);
INSERT INTO pedido_producto VALUES (7, 2400.00, 56, 1, NULL);
INSERT INTO pedido_producto VALUES (2, 150000.00, 1, 2, NULL);
INSERT INTO pedido_producto VALUES (10, 2400.00, 43, 1, ' ');
INSERT INTO pedido_producto VALUES (11, 2400.00, 34, 1, ' ');
INSERT INTO pedido_producto VALUES (12, 2400.00, 4, 1, ' ');
INSERT INTO pedido_producto VALUES (12, 100000.00, 4, 2, 'arriendo');
INSERT INTO pedido_producto VALUES (13, 2400.00, 45, 1, ' ');
INSERT INTO pedido_producto VALUES (13, 100000.00, 45, 2, 'comodato');
INSERT INTO pedido_producto VALUES (14, 2400.00, 435, 1, ' ');
INSERT INTO pedido_producto VALUES (14, 100000.00, 435, 2, 'arriendo');
INSERT INTO pedido_producto VALUES (15, 2400.00, 45, 1, ' ');
INSERT INTO pedido_producto VALUES (15, 100000.00, 45, 2, 'comodato');
INSERT INTO pedido_producto VALUES (15, 5000.00, 234, 3, ' ');
INSERT INTO pedido_producto VALUES (16, 2400.00, 34, 1, ' ');
INSERT INTO pedido_producto VALUES (16, 100000.00, 34, 2, 'arriendo');
INSERT INTO pedido_producto VALUES (16, 5000.00, 5, 3, ' ');
INSERT INTO pedido_producto VALUES (17, 2400.00, 34, 1, ' ');
INSERT INTO pedido_producto VALUES (18, 2400.00, 5, 1, ' ');
INSERT INTO pedido_producto VALUES (18, 100000.00, 5, 2, 'venta');
INSERT INTO pedido_producto VALUES (19, 2400.00, 2, 1, ' ');
INSERT INTO pedido_producto VALUES (19, 100000.00, 2, 2, 'arriendo');
INSERT INTO pedido_producto VALUES (19, 5000.00, 2, 3, ' ');
INSERT INTO pedido_producto VALUES (20, 2400.00, 2, 1, ' ');
INSERT INTO pedido_producto VALUES (20, 100000.00, 2, 2, 'venta');
INSERT INTO pedido_producto VALUES (20, 5000.00, 4, 3, ' ');
INSERT INTO pedido_producto VALUES (21, 2400.00, 45, 1, ' ');


--
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO perfil VALUES (1, 'administrador', 'administrador del sistema');
INSERT INTO perfil VALUES (2, 'despachador', 'despachador de pedidos');


--
-- Data for Name: perfil_menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO perfil_menu VALUES (0, 1, '<i class="icon-pointer"></i> Herramientas');
INSERT INTO perfil_menu VALUES (1, 2, '<a href="#" title="Maps">
<i class="icon-user"></i> Clientes
</a>');


--
-- Data for Name: perfil_submenu; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO producto VALUES (2, 'Maquina FC', 'maquina frio calor');
INSERT INTO producto VALUES (3, 'Dispensador', 'dispensador de plastico');
INSERT INTO producto VALUES (1, 'Botellon 20', 'botellon retornable 20 litros de agua ');


--
-- Data for Name: solicitud_cotizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO solicitud_cotizacion VALUES (22, 'juan pablo baez alfaro', 'jbaezalfaro@gmail.com', '9968493959', 'Buenas tarde 
Quisiera saber el valor unitario de bidones de agua DE 20 litros, si uno compra mas de 100 unidades y ademas el valor de los dispensadores sobre 50 unidades
espero respuesta', '2016-08-17 19:30:51.603202', 'nok');
INSERT INTO solicitud_cotizacion VALUES (25, 'Rodrigo Cubillos', 'tecnicoconstruc@gmail.com', '+56967313446', 'Cotizacion dispensador chico con dos vidones con agua.
', '2016-09-10 17:26:59.076157', 'nok');
INSERT INTO solicitud_cotizacion VALUES (28, 'Gustavo moreno', 'morenoguatavo34@gmail.com', '90204859', 'Buenas tardes , venden al por mayor ?', '2016-09-18 21:56:14.798946', 'nok');
INSERT INTO solicitud_cotizacion VALUES (30, 'TANIA YAÑEZ', 'TANIA.Y@HOTMAIL.CL', '984173758', 'NECESITO COTIZAR:
1 DISPENSADOR DE AGUA EN MESA
2 BIDONES 10 L 
EL DESPACHO ES CON COSTO??? VIVO EN CIUDAD SATELITE 
CUANTO ES EL MINIMO DE BIDONES SE PUEDE PEDIR ?', '2016-09-21 13:19:38.610454', 'nok');
INSERT INTO solicitud_cotizacion VALUES (31, 'Karin Lagos Heise', 'karin.lgs@gmail.com', '977393772', 'Estimados, es posible la adquisición de 3 bidones de 20 litros?
Enviados a mi domicilio en la comuna de La Florida.
Se agradece y saluda cordialmente, ', '2016-09-21 16:49:27.048997', 'nok');
INSERT INTO solicitud_cotizacion VALUES (32, 'Paola rodriguez fuentes ', 'p.rodriguez.entel@gmail.com', '+56957693382', 'Necesito saber precio de  dispensador  y bidones de agua.', '2016-10-01 08:16:05.16459', 'nok');
INSERT INTO solicitud_cotizacion VALUES (33, 'carolina castillo', 'carolina.castillo.montenegro@gmail.com', '963401657', 'Buenas tardes, necesito cotizar el valor de un dispensador y 10 bidones de agua con despacho en ruta G-660 (camino Los Guindos) #14.200 parcela 2 (pasado puente Mariposa).

', '2016-10-03 14:53:30.391268', 'nok');
INSERT INTO solicitud_cotizacion VALUES (34, 'Paola Montini', 'p.montinis@gmail.com', '974302210', 'Estimados, 

Junto con saludar, me gustaría cotizar el arriendo de una Máquina dispensadora de agua Frío-Calor. Además de bidones. 

Quedo atenta
Saludos,
', '2016-10-04 08:48:16.491785', 'nok');
INSERT INTO solicitud_cotizacion VALUES (35, 'Magdalena Salvestrini', 'msalvestrini@gmail.com', '569-99992391', 'Hola quisiera cotizar 1000 botellas de agua 500 ml personalizadas para un cliente. Tengo una empresa dedicada a los regalos pubblicitarios.
Muchas gracias,

Magdalena ', '2016-10-05 11:14:03.167451', 'nok');
INSERT INTO solicitud_cotizacion VALUES (38, 'Maureen ', 'maureen.puch@gmail.com', '949436061', 'Junto con saludar necesito cotizar 500 botellas personalizadas de 500 cc.

Saludos', '2016-10-21 15:53:59.955467', 'nok');
INSERT INTO solicitud_cotizacion VALUES (39, 'Cristophen lavin', 'Jhonblack61@hotmail.com', '', 'Estimados, tengo un emprendimiento de vender bidones de 20 litros y 12 litros y necesito saber cual es el valor x litro de agua. Obvio que tengos mis envases, espero su respuesta gracias.', '2016-10-25 17:05:16.101692', 'nok');
INSERT INTO solicitud_cotizacion VALUES (40, 'Paola vivallo', 'pvivallo@hotmail.com', '98204333', 'Buenas tardes,
Favor cotizar 1.000 botellas personalizadas con logo institucional.
Favor enviar foto referencial y tiempos estimados de trabajo post aprobación de OT.
Saludos.', '2016-10-26 12:16:55.706199', 'nok');
INSERT INTO solicitud_cotizacion VALUES (41, 'carlos peña', 'carlos.penazuniga@santaisabel.cl', '987751289', 'solicito cotizar maquina frio calor mas 3 bidones de agua', '2016-10-27 17:28:31.817482', 'nok');
INSERT INTO solicitud_cotizacion VALUES (42, 'carlos peña', 'carlos.penazuniga@santaisabel.cl', '987751289', 'solicito cotizar maquina frio calor mas 3 bidones de agua', '2016-10-27 17:30:10.638988', 'nok');
INSERT INTO solicitud_cotizacion VALUES (43, 'katherine acosta', 'kattaacosta@gmail.com', '982961104', 'quisiera cotizar 2 bidones de 20 lts. mas dispensador de sobremesa. con despacho a la florida
gracias', '2016-11-02 16:23:48.536952', 'nok');
INSERT INTO solicitud_cotizacion VALUES (44, 'Liliana Gonzalez Ubilla', 'liliana.gonzalez.u@gmail.com', '(+56 2) 25756642 ', 'Hola, Buenos dias quisiera saber el precio de arriendo de Máquina dispensadora de agua Frío-Calor.

Gracias,', '2016-11-04 09:38:57.228822', 'nok');
INSERT INTO solicitud_cotizacion VALUES (45, 'Sandra Ponce', 'sandra.ponce@udp.cl', '26762886', 'Estimados

se solicita cotización de botellas de agua personalizada, por la cantidad de 3000 y 5000 unidades, indicar los cc de las botellas

Atte.,
Sandra Ponce L.
Encargada de Ceremonia y Protocolo
Dirección de Comunicaciones
Universidad Diego Portales
Fono: 2676 2886 / +56 9 5873 3080


', '2016-11-07 12:01:58.168132', 'nok');
INSERT INTO solicitud_cotizacion VALUES (46, 'max mellado', 'maxi.mellado@gmail.com', '991404227', ' solicito a ustedes cotizar 1000 u/n de botellas pet de 550.  aprox. Con logo en blanco y negro o color a definir. pero siempre a dos colores.

saludos', '2016-11-07 14:21:54.912652', 'nok');
INSERT INTO solicitud_cotizacion VALUES (47, 'FLAVIO PARRA NUQUEZ', 'fparra@empresasbusel.cl', '967175651', 'necesitamos arrendar dispensador mas bidones de agua.', '2016-11-08 16:05:40.757977', 'nok');
INSERT INTO solicitud_cotizacion VALUES (48, 'Guadalupe Díaz', 'guadalupediaz.m@gmail.com', '958982560', 'Buen día

Solicito favor cotizacion de arriendo dispensador frio caliente y capacidad de botellon de la maquina y si el valor de arriendo incluye reposicion de botellon. Ademas de el valor de la maquina y metodos de pago. 

Gracias', '2016-11-10 10:07:44.643042', 'nok');
INSERT INTO solicitud_cotizacion VALUES (49, 'osvaldo meneses', 'osvaldo.meneses@pacal.cl', '942440632', 'Buenas tardes
 necesito cotización de           - 3 dispensadores de agua fría y caliente 
                                               - 2 dispensadores económicos de agua fría
                                               - 30 recargas de agua mensual 

todo esto es para una obra de constructora Pacal,nueva vida Peñaflor ubicada en Pedro Correa 438.Peñaflor (Nuestra empresa trabaja con orden de compra)
quedo atento a su respuesta.Muchas Gracias ', '2016-11-10 14:55:08.76681', 'nok');
INSERT INTO solicitud_cotizacion VALUES (50, 'Felipe ferrada', 'felipeferradaureta@gmail.com', '981399714', 'Estimados 
Quería cotizar dispensador más 6 bidones de 20 litros
Es para el sábado domingo y lunes en la feria viva( parque bicentenario)
Sld ', '2016-11-10 16:53:42.516183', 'nok');
INSERT INTO solicitud_cotizacion VALUES (51, 'carlos', 'cgarciagut@gmail.com', '', 'Hola, Quisiera saber el valor de los botellones y el valor del dispensador de mesa para despachar al sector de El Paico.

Saludos.', '2016-11-14 12:29:10.883202', 'nok');
INSERT INTO solicitud_cotizacion VALUES (52, 'Cristian Norambuena', 'bernardonorambuena@gmail.com', '965767238', 'Necesito personalizar agua en botella de 500 cc, cual es el valor por unidad?

quedaré atento a tus comentarios.

', '2016-11-14 15:16:37.84459', 'nok');
INSERT INTO solicitud_cotizacion VALUES (53, 'Valeria', 'valeria.pinochet@segic.usach.cl', '27180203', 'Estimados, espero me puedan ayudar con la cotización de 5 dispensadores de agua para nuestras oficinas de SEGIC USACH LTDA.', '2016-11-17 11:41:17.786145', 'nok');
INSERT INTO solicitud_cotizacion VALUES (54, 'Paulina Moreno', 'Pmorenoc1710@gmail.com', '', 'Hola quiero saber precios de arriendo de maquina frio caliente y el valor de los bidones.
Como es el despacho?', '2016-11-19 15:44:58.489701', 'nok');
INSERT INTO solicitud_cotizacion VALUES (55, 'carla maureira', 'carlita_mau@hotmail.com', '958590979', 'quisiera cotizar el dispensador calor frio para casa particular
comuna de la granja
Gracias', '2016-11-23 13:27:29.499249', 'nok');
INSERT INTO solicitud_cotizacion VALUES (57, 'Alejandra Saavedra', 'Alevsaavedra@hotmail.com', '987752863', 'Hola, quiero saber precio del bidón  grande mas la maquina , vivo en culipran a 300 metro de cruce  san Manuel.. cuanto seria el despacho ? gracias.', '2016-12-08 17:36:59.374133', 'nok');
INSERT INTO solicitud_cotizacion VALUES (58, 'Margarita Torres', 'mat.torres.moya@gmail.com', '+56961930743', 'Hola, quisiera saber si tienen despacho a las Condes, cuanto es el minimo de botellones de agua y que precio tiene el bidon de 20 litros.
gracias!!...
saludos,', '2016-12-12 11:30:49.425033', 'nok');
INSERT INTO solicitud_cotizacion VALUES (59, 'ana quezada', 'anita.quezada.perez@gmail.com', '978229031', 'hola queria cotizar valor de la maquina dispensadora de frio- calor y modalidades de pago', '2016-12-13 10:39:54.370412', 'nok');
INSERT INTO solicitud_cotizacion VALUES (62, 'veronica ramirez', 'veronica.ramirez@ryrequiposltda.com', '56223721270', 'necesito cotizar un dispensador de agua caliente y fria con botellones de agua y el suministro mensual,
muchas gracias', '2016-12-15 11:54:50.838587', 'nok');
INSERT INTO solicitud_cotizacion VALUES (63, 'Katherine Cortez', 'katherine.cortez@monsanto.com', '+56953349604', 'Buenas tardes:

Necesito una cotización de 10 bidones de 20 litros de agua purificada por favor,

A la espera de su respuesta,

Atte,
Katherine Cortez

Monsanto Chile
PR-RC', '2016-12-15 12:27:43.54471', 'nok');
INSERT INTO solicitud_cotizacion VALUES (67, 'christopher monroy', 'cmonroy.ce@gmail.com', '997796273', 'buenas tardes
necesito el precio del dispensador de agua de mesa. favor responder a mi solicitud
saludos', '2016-12-28 15:52:36.467071', 'nok');
INSERT INTO solicitud_cotizacion VALUES (69, 'Leonardo roa', 'le.roa95@gmail.com', '995973256', 'Deseo cotizar maquina para mantener agua helada + bidón ', '2017-01-04 15:42:50.934162', 'nok');
INSERT INTO solicitud_cotizacion VALUES (70, 'Leonardo roa', 'le.roa95@gmail.com', '995973256', 'Deseo cotizar maquina para mantener agua helada + bidón ', '2017-01-04 15:43:44.774169', 'nok');
INSERT INTO solicitud_cotizacion VALUES (71, 'Sergio fuentes herrada ', 'Se.fuentes.h@gmail.com', '989400886', 'Buenos dias consultó el valor de sus productos por mayor . Gracias.', '2017-01-06 11:10:48.694471', 'nok');
INSERT INTO solicitud_cotizacion VALUES (72, 'Manuel Matta Herrada', 'nachomatta@gmail.com', '+56988656316', 'Estimados
les escribo por que quiero comenzar una venta de agua fuera de la comuna de Melipilla, en estos momentos ando en busca de alguna empresa que me pueda abastecer de agua, en un principio para revender en el sector donde me instalare, quiero saber que es lo queme pueden ofrecer o darme alguna orientación la agradecería mucho. saludos', '2017-01-06 14:59:52.998116', 'nok');
INSERT INTO solicitud_cotizacion VALUES (73, 'ELISA SALAZAR', 'elisasalazarvargas@gmail.com', '978527209', 'QUIESIERA SABER CUANTO SALE EL BOTELLON Y EL ARRIENDO DEL DISPENSADOR FRIO Y CALOR ESTO ES PARA SAN MANUEL ', '2017-01-07 11:31:52.251218', 'nok');
INSERT INTO solicitud_cotizacion VALUES (74, 'Carmen Gloria Sylva', 'pili.sylva@peaks.cl', '977068003', 'hola, como están?
Necesito cotizar 2000 y 5000 botellas de 500 cc con etiqueta y logo personalizado 
muchas gracias 
saludos 
', '2017-01-11 12:40:55.813806', 'nok');
INSERT INTO solicitud_cotizacion VALUES (75, 'Sandra Garcia Vasquez', 'sgarcia@pullman.cl', '25603751', 'Buenas tardes, 
Necesito una cotización de un dispensador de agua fría y caliente  por un arriendo y otro por compra.

Atte.,

Sandra Garcia', '2017-01-16 15:16:38.058926', 'nok');
INSERT INTO solicitud_cotizacion VALUES (76, 'Sandra Garcia Vasquez', 'sgarcia@pullman.cl', '25603751', 'Buenas tardes, 
Necesito una cotización de un dispensador de agua fría y caliente  por un arriendo y otro por compra.

Atte.,

Sandra Garcia', '2017-01-16 15:16:49.80208', 'nok');
INSERT INTO solicitud_cotizacion VALUES (77, 'Lorena Gonzalez V', 'lorenagonzv85@gmail.com', '963392177', 'buenas tardes quiero cotizar el valor del bidon y el dispensador de agua,estare atenta en comentarios', '2017-01-17 14:07:17.66429', 'nok');
INSERT INTO solicitud_cotizacion VALUES (78, 'Patricia Garcia romero', 'lampara1946@gmail.com', '964462330', 'Quiero rentar maquina y  comprarbidones S/Sodio...Necesito precios', '2017-01-17 15:43:14.954099', 'nok');
INSERT INTO solicitud_cotizacion VALUES (79, 'Nicole Toledo', 'nicole.toledo@irconsulting.cl', '222248477', 'Estimados, requiero cotizar el valor por los siguientes servicios: arriendo de dos dispensadores de agua frio/calor y 15 botellones mensuales de 20 litros para nuestras oficinas.  Favor comentar medios de pago, Saludos!', '2017-01-20 10:31:34.627107', 'nok');
INSERT INTO solicitud_cotizacion VALUES (80, 'Estefania Farias', 'estefania.farias@monsanto.com', '78262508', 'Me gustaría pedir la cotización de 15 bidones de 20 litros de Agua Prana, también con despacho a MONSANTO PLANTA PAINE, ubicada en Panamericana Sur Km. 41 1/2, Parcela 175-177, Comuna de Paine.', '2017-01-21 18:38:05.657609', 'nok');
INSERT INTO solicitud_cotizacion VALUES (81, 'Macarenna Vergara', 'mvergara@gpsglobal.cl', '954080008', 'Favor cotizar dispensador.', '2017-01-25 13:13:00.258788', 'nok');
INSERT INTO solicitud_cotizacion VALUES (82, 'ricardo azocar reyes', 'ricardo.azocar@gmail.com', '44644667', 'necesito cotizaciòn de botellones de 20 litros
', '2017-01-25 17:54:16.303681', 'nok');
INSERT INTO solicitud_cotizacion VALUES (83, '', '', '', '', '2017-01-26 04:08:03.913847', 'nok');
INSERT INTO solicitud_cotizacion VALUES (84, 'CAROLINA CONTRERAS', 'carolina.c.ahumada@gmail.com', '985743383', 'SOLICITO COTIZACIÓN DE 50 BIDONES DE AGUA (5 LTS C/U)', '2017-01-26 10:31:37.467076', 'nok');
INSERT INTO solicitud_cotizacion VALUES (85, 'Jorge Aliaga Salinas', 'joaliaga@vtr.net', '', 'El dispensador de agua de mesa, es universal?....vale decir puedo colocar bidones de otras marcas, ya que si está en Melipilla no puedo ir a comprar uno o dos bidones, es preferible el distribuidor local en Ñuñoa, que es mi barrio
Cual es el costo y donde lo puedo comprar.
Como referencia cual es el valor del dispensador de agua frío - calor ?', '2017-02-01 18:14:04.104726', 'nok');
INSERT INTO solicitud_cotizacion VALUES (86, 'celia morales', 'cmorales@agroimec.com', '226501215', 'estimados, favor cotizar dispensador con agua fria y caliente, y 12 bidones de 20 lts mensuales', '2017-02-02 17:40:03.86678', 'nok');
INSERT INTO solicitud_cotizacion VALUES (87, 'hector cordero', 'h.emiliocordero@hotmail.com', '+569 78718030', 'estimados
quiero comenzar un emprendimiento y quisiera saber los costos de agua embotellada de 500 y 1500 cc con etiqueta personalizada.
son con gas y sin gas 
atento a sus comentarios

hector  ', '2017-02-03 19:36:32.934158', 'nok');
INSERT INTO solicitud_cotizacion VALUES (88, '', '', '', '', '2017-02-14 22:45:16.911551', 'nok');
INSERT INTO solicitud_cotizacion VALUES (89, 'Diego Hidalgo', 'dhidalgo@cb-consulting.cl', '89013523', 'Estimado;

Necesito una cotización para comprar agua en bidón y las maquinas en las que se usan los bidones para tener el agua fría y caliente.

Saludos cordiales.', '2017-02-15 11:58:34.510282', 'nok');
INSERT INTO solicitud_cotizacion VALUES (90, 'SARA ABUSLEME', 'constructorasyt@yahoo.es', '96619 2218', 'NECESITO COTIZAR DISPENSADORES AGUA FRIA ARRIENDO ..somos empresa', '2017-02-15 17:46:41.253271', 'nok');
INSERT INTO solicitud_cotizacion VALUES (91, 'claudio reyes', 'claudioreyes2810@gmail.com', '964257639', 'ustedes venden el llenado de bidones solamente?, por que poseo una marca de agua propia. atento a su respuesta.', '2017-02-18 17:37:27.177563', 'nok');


--
-- Data for Name: telefono; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuario VALUES (1, 'francisco vergara', 'francisco@isatix.org', 'lalola', '1,2');
INSERT INTO usuario VALUES (2, '2', '', '', '');
INSERT INTO usuario VALUES (3, 'nuevo contacto', 'francisco@isatix.org', '', 'on,on,on');
INSERT INTO usuario VALUES (4, 'yyyyyy', 'francisco@isatix.org', 'lalola', '1,2,3');


--
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (rut);


--
-- Name: contacto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contacto
    ADD CONSTRAINT contacto_pkey PRIMARY KEY (rut_contacto);


--
-- Name: cotizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cotizacion
    ADD CONSTRAINT cotizacion_pkey PRIMARY KEY (id);


--
-- Name: pedido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (id);


--
-- Name: producto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id);


--
-- Name: solicitud_cotizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY solicitud_cotizacion
    ADD CONSTRAINT solicitud_cotizacion_pkey PRIMARY KEY (id);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: cotizacion_producto_id_cotizacion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cotizacion_producto
    ADD CONSTRAINT cotizacion_producto_id_cotizacion_fkey FOREIGN KEY (id_cotizacion) REFERENCES cotizacion(id);


--
-- Name: cotizacion_producto_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cotizacion_producto
    ADD CONSTRAINT cotizacion_producto_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES producto(id);


--
-- Name: direccion_rut_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY direccion
    ADD CONSTRAINT direccion_rut_cliente_fkey FOREIGN KEY (rut_cliente) REFERENCES cliente(rut);


--
-- Name: pedido_producto_id_pedido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido_producto
    ADD CONSTRAINT pedido_producto_id_pedido_fkey FOREIGN KEY (id_pedido) REFERENCES pedido(id);


--
-- Name: pedido_producto_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido_producto
    ADD CONSTRAINT pedido_producto_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES producto(id);


--
-- Name: pedido_rut_contacto_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_rut_contacto_cliente_fkey FOREIGN KEY (rut_contacto_cliente) REFERENCES contacto(rut_contacto);


--
-- Name: rut_cliente_clave; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contacto
    ADD CONSTRAINT rut_cliente_clave FOREIGN KEY (rut_cliente) REFERENCES cliente(rut);


--
-- Name: telefono_rut_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY telefono
    ADD CONSTRAINT telefono_rut_cliente_fkey FOREIGN KEY (rut_cliente) REFERENCES cliente(rut);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: cliente; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE cliente FROM PUBLIC;
REVOKE ALL ON TABLE cliente FROM postgres;
GRANT ALL ON TABLE cliente TO postgres;


--
-- Name: contacto; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE contacto FROM PUBLIC;
REVOKE ALL ON TABLE contacto FROM postgres;
GRANT ALL ON TABLE contacto TO postgres;


--
-- Name: cotizacion; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE cotizacion FROM PUBLIC;
REVOKE ALL ON TABLE cotizacion FROM postgres;
GRANT ALL ON TABLE cotizacion TO postgres;


--
-- Name: cotizacion_cliente; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE cotizacion_cliente FROM PUBLIC;


--
-- Name: cotizacion_producto; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE cotizacion_producto FROM PUBLIC;
REVOKE ALL ON TABLE cotizacion_producto FROM postgres;
GRANT ALL ON TABLE cotizacion_producto TO postgres;


--
-- Name: despacho; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE despacho FROM PUBLIC;


--
-- Name: direccion; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE direccion FROM PUBLIC;
REVOKE ALL ON TABLE direccion FROM postgres;
GRANT ALL ON TABLE direccion TO postgres;


--
-- Name: pedido; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE pedido FROM PUBLIC;


--
-- Name: pedido.id; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL(id) ON TABLE pedido FROM PUBLIC;
REVOKE ALL(id) ON TABLE pedido FROM postgres;
GRANT ALL(id) ON TABLE pedido TO postgres WITH GRANT OPTION;


--
-- Name: pedido_producto; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE pedido_producto FROM PUBLIC;
REVOKE ALL ON TABLE pedido_producto FROM postgres;
GRANT ALL ON TABLE pedido_producto TO postgres;


--
-- Name: pedido_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE pedido_seq FROM PUBLIC;


--
-- Name: perfil; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE perfil FROM PUBLIC;
REVOKE ALL ON TABLE perfil FROM postgres;
GRANT ALL ON TABLE perfil TO postgres;


--
-- Name: perfil_id_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE perfil_id_seq FROM PUBLIC;


--
-- Name: producto; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE producto FROM PUBLIC;
REVOKE ALL ON TABLE producto FROM postgres;
GRANT ALL ON TABLE producto TO postgres;


--
-- Name: solicitud_cotizacion; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE solicitud_cotizacion FROM PUBLIC;


--
-- Name: telefono; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE telefono FROM PUBLIC;
REVOKE ALL ON TABLE telefono FROM postgres;
GRANT ALL ON TABLE telefono TO postgres;


--
-- Name: usuario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE usuario FROM PUBLIC;


--
-- PostgreSQL database dump complete
--

