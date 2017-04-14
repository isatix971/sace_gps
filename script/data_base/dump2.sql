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
-- Name: carga_descarga; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE carga_descarga (
    fecha timestamp without time zone,
    id_llenador integer,
    id_usuario integer,
    id_producto integer,
    llenos integer,
    vacios integer
);


ALTER TABLE public.carga_descarga OWNER TO postgres;

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

SELECT pg_catalog.setval('cotizacion_cliente', 103, true);


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
-- Name: devolucion_envase_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE devolucion_envase_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.devolucion_envase_seq OWNER TO postgres;

--
-- Name: devolucion_envase_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('devolucion_envase_seq', 4, true);


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
-- Name: pago_devolucion_envase; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pago_devolucion_envase (
    id integer,
    id_pedido integer,
    id_producto integer,
    cantidad_devuelta integer,
    fecha_devolucion timestamp without time zone,
    comentarios character varying,
    estado_pago character varying
);


ALTER TABLE public.pago_devolucion_envase OWNER TO postgres;

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

SELECT pg_catalog.setval('pedido_seq', 26, true);


--
-- Name: perfil_id_seq	; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "perfil_id_seq	"
    START WITH 20
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."perfil_id_seq	" OWNER TO postgres;

--
-- Name: perfil_id_seq	; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"perfil_id_seq	"', 20, false);


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
-- Name: stock_llenado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE stock_llenado (
    id_llenador integer,
    manana_tarde character varying,
    llenos integer,
    vacios integer,
    fecha timestamp without time zone,
    llenado_diario integer
);


ALTER TABLE public.stock_llenado OWNER TO postgres;

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

SELECT pg_catalog.setval('usuarios_id_seq', 12, true);


--
-- Name: ventas_oficina_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ventas_oficina_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.ventas_oficina_seq OWNER TO postgres;

--
-- Name: ventas_oficina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ventas_oficina_seq', 1, true);


--
-- Name: ventas_oficina; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ventas_oficina (
    id_venta integer DEFAULT nextval('ventas_oficina_seq'::regclass),
    fecha timestamp without time zone,
    id_usuario integer,
    tipo text
);


ALTER TABLE public.ventas_oficina OWNER TO postgres;

--
-- Name: ventas_oficina_detalle; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ventas_oficina_detalle (
    id_venta integer,
    id_producto integer,
    cantidad integer
);


ALTER TABLE public.ventas_oficina_detalle OWNER TO postgres;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: carga_descarga; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY carga_descarga (fecha, id_llenador, id_usuario, id_producto, llenos, vacios) FROM stdin;
\.


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cliente (rut, dv, nombre_rzn_social, giro, telefono) FROM stdin;
44444444	4	cliente nuevo	giro inventado	999999999
79527230	5	emin ingenieria y construccion sa	CONSTRUCCION	22998076
\.


--
-- Data for Name: contacto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY contacto (nombre, correo, contrasena, rut_cliente, rut_contacto, dv_contacto, telefono) FROM stdin;
cliente nuevo	cliente@pra	contraseña	44444444	44444444	4	999999999
Danilo Rojas Zamora	drojasz@emin.cl	contraseña	79527230	16702507	2	966761301
\.


--
-- Data for Name: cotizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cotizacion (id, fecha_coti, fecha_vigencia, nombre_cliente, rut_cliente, dv_cliente, correo, telefono, vigencia) FROM stdin;
1	2016-07-22	2016-07-22	ret	1	2	ergd	sdfg	si
3	2016-07-25	2016-07-25	asdf	3	2	dg	asdf	si
\.


--
-- Data for Name: cotizacion_producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cotizacion_producto (id_cotizacion, precio_unidad, cantidad, id_producto) FROM stdin;
\.


--
-- Data for Name: despacho; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY despacho (id_pedido, id_despachador) FROM stdin;
2	1
10	4
14	4
11	4
4	4
12	4
17	1
18	4
19	1
20	4
10	1
21	1
23	5
24	1
26	5
\.


--
-- Data for Name: direccion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY direccion (rut_cliente, calle, numero, casa_depto, comuna, ciudad) FROM stdin;
44444444	callesita	23			
79527230	felix de amesti	90	3	las condes	las condes
\.


--
-- Data for Name: pago_devolucion_envase; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pago_devolucion_envase (id, id_pedido, id_producto, cantidad_devuelta, fecha_devolucion, comentarios, estado_pago) FROM stdin;
1	10	1	25	2017-03-13 22:17:37.065251	mlkmñlkm{lk	ok
2	23	1	10	2017-03-15 11:55:46.575097	ninguno	ok
3	24	1	3	2017-03-15 12:28:17.97263	dfgh	nok
4	26	1	100	2017-03-25 14:30:34.985359	...	nok
\.


--
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pedido (id, rut_contacto_cliente, fecha_pedido, fecha_estimada, fecha_entrega, factura, guia, estado) FROM stdin;
26	16702507	2017-03-25 14:06:45.783527	2017-03-22 00:00:00	2017-03-25 14:30:34.991972	0	1254	entregado
\.


--
-- Data for Name: pedido_producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pedido_producto (id_pedido, precio_unidad, cantidad, id_producto, detalle) FROM stdin;
26	2400.00	120	1	 
\.


--
-- Data for Name: producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY producto (id, nombre, descripcion) FROM stdin;
2	Maquina FC	maquina frio calor
3	Dispensador	dispensador de plastico
1	Botellon 20	botellon retornable 20 litros de agua 
\.


--
-- Data for Name: solicitud_cotizacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY solicitud_cotizacion (id, nombre, correo, telefono, mensaje, fecha, estado) FROM stdin;
48	Guadalupe Díaz	guadalupediaz.m@gmail.com	958982560	Buen día\n\nSolicito favor cotizacion de arriendo dispensador frio caliente y capacidad de botellon de la maquina y si el valor de arriendo incluye reposicion de botellon. Ademas de el valor de la maquina y metodos de pago. \n\nGracias	2016-11-10 10:07:44.643042	nok
49	osvaldo meneses	osvaldo.meneses@pacal.cl	942440632	Buenas tardes\n necesito cotización de           - 3 dispensadores de agua fría y caliente \n                                               - 2 dispensadores económicos de agua fría\n                                               - 30 recargas de agua mensual \n\ntodo esto es para una obra de constructora Pacal,nueva vida Peñaflor ubicada en Pedro Correa 438.Peñaflor (Nuestra empresa trabaja con orden de compra)\nquedo atento a su respuesta.Muchas Gracias 	2016-11-10 14:55:08.76681	nok
50	Felipe ferrada	felipeferradaureta@gmail.com	981399714	Estimados \nQuería cotizar dispensador más 6 bidones de 20 litros\nEs para el sábado domingo y lunes en la feria viva( parque bicentenario)\nSld 	2016-11-10 16:53:42.516183	nok
51	carlos	cgarciagut@gmail.com		Hola, Quisiera saber el valor de los botellones y el valor del dispensador de mesa para despachar al sector de El Paico.\n\nSaludos.	2016-11-14 12:29:10.883202	nok
52	Cristian Norambuena	bernardonorambuena@gmail.com	965767238	Necesito personalizar agua en botella de 500 cc, cual es el valor por unidad?\n\nquedaré atento a tus comentarios.\n\n	2016-11-14 15:16:37.84459	nok
53	Valeria	valeria.pinochet@segic.usach.cl	27180203	Estimados, espero me puedan ayudar con la cotización de 5 dispensadores de agua para nuestras oficinas de SEGIC USACH LTDA.	2016-11-17 11:41:17.786145	nok
54	Paulina Moreno	Pmorenoc1710@gmail.com		Hola quiero saber precios de arriendo de maquina frio caliente y el valor de los bidones.\nComo es el despacho?	2016-11-19 15:44:58.489701	nok
55	carla maureira	carlita_mau@hotmail.com	958590979	quisiera cotizar el dispensador calor frio para casa particular\ncomuna de la granja\nGracias	2016-11-23 13:27:29.499249	nok
57	Alejandra Saavedra	Alevsaavedra@hotmail.com	987752863	Hola, quiero saber precio del bidón  grande mas la maquina , vivo en culipran a 300 metro de cruce  san Manuel.. cuanto seria el despacho ? gracias.	2016-12-08 17:36:59.374133	nok
58	Margarita Torres	mat.torres.moya@gmail.com	+56961930743	Hola, quisiera saber si tienen despacho a las Condes, cuanto es el minimo de botellones de agua y que precio tiene el bidon de 20 litros.\ngracias!!...\nsaludos,	2016-12-12 11:30:49.425033	nok
59	ana quezada	anita.quezada.perez@gmail.com	978229031	hola queria cotizar valor de la maquina dispensadora de frio- calor y modalidades de pago	2016-12-13 10:39:54.370412	nok
62	veronica ramirez	veronica.ramirez@ryrequiposltda.com	56223721270	necesito cotizar un dispensador de agua caliente y fria con botellones de agua y el suministro mensual,\nmuchas gracias	2016-12-15 11:54:50.838587	nok
63	Katherine Cortez	katherine.cortez@monsanto.com	+56953349604	Buenas tardes:\n\nNecesito una cotización de 10 bidones de 20 litros de agua purificada por favor,\n\nA la espera de su respuesta,\n\nAtte,\nKatherine Cortez\n\nMonsanto Chile\nPR-RC	2016-12-15 12:27:43.54471	nok
67	christopher monroy	cmonroy.ce@gmail.com	997796273	buenas tardes\nnecesito el precio del dispensador de agua de mesa. favor responder a mi solicitud\nsaludos	2016-12-28 15:52:36.467071	nok
69	Leonardo roa	le.roa95@gmail.com	995973256	Deseo cotizar maquina para mantener agua helada + bidón 	2017-01-04 15:42:50.934162	nok
70	Leonardo roa	le.roa95@gmail.com	995973256	Deseo cotizar maquina para mantener agua helada + bidón 	2017-01-04 15:43:44.774169	nok
71	Sergio fuentes herrada 	Se.fuentes.h@gmail.com	989400886	Buenos dias consultó el valor de sus productos por mayor . Gracias.	2017-01-06 11:10:48.694471	nok
72	Manuel Matta Herrada	nachomatta@gmail.com	+56988656316	Estimados\nles escribo por que quiero comenzar una venta de agua fuera de la comuna de Melipilla, en estos momentos ando en busca de alguna empresa que me pueda abastecer de agua, en un principio para revender en el sector donde me instalare, quiero saber que es lo queme pueden ofrecer o darme alguna orientación la agradecería mucho. saludos	2017-01-06 14:59:52.998116	nok
73	ELISA SALAZAR	elisasalazarvargas@gmail.com	978527209	QUIESIERA SABER CUANTO SALE EL BOTELLON Y EL ARRIENDO DEL DISPENSADOR FRIO Y CALOR ESTO ES PARA SAN MANUEL 	2017-01-07 11:31:52.251218	nok
74	Carmen Gloria Sylva	pili.sylva@peaks.cl	977068003	hola, como están?\nNecesito cotizar 2000 y 5000 botellas de 500 cc con etiqueta y logo personalizado \nmuchas gracias \nsaludos \n	2017-01-11 12:40:55.813806	nok
75	Sandra Garcia Vasquez	sgarcia@pullman.cl	25603751	Buenas tardes, \nNecesito una cotización de un dispensador de agua fría y caliente  por un arriendo y otro por compra.\n\nAtte.,\n\nSandra Garcia	2017-01-16 15:16:38.058926	nok
76	Sandra Garcia Vasquez	sgarcia@pullman.cl	25603751	Buenas tardes, \nNecesito una cotización de un dispensador de agua fría y caliente  por un arriendo y otro por compra.\n\nAtte.,\n\nSandra Garcia	2017-01-16 15:16:49.80208	nok
77	Lorena Gonzalez V	lorenagonzv85@gmail.com	963392177	buenas tardes quiero cotizar el valor del bidon y el dispensador de agua,estare atenta en comentarios	2017-01-17 14:07:17.66429	nok
78	Patricia Garcia romero	lampara1946@gmail.com	964462330	Quiero rentar maquina y  comprarbidones S/Sodio...Necesito precios	2017-01-17 15:43:14.954099	nok
79	Nicole Toledo	nicole.toledo@irconsulting.cl	222248477	Estimados, requiero cotizar el valor por los siguientes servicios: arriendo de dos dispensadores de agua frio/calor y 15 botellones mensuales de 20 litros para nuestras oficinas.  Favor comentar medios de pago, Saludos!	2017-01-20 10:31:34.627107	nok
80	Estefania Farias	estefania.farias@monsanto.com	78262508	Me gustaría pedir la cotización de 15 bidones de 20 litros de Agua Prana, también con despacho a MONSANTO PLANTA PAINE, ubicada en Panamericana Sur Km. 41 1/2, Parcela 175-177, Comuna de Paine.	2017-01-21 18:38:05.657609	nok
81	Macarenna Vergara	mvergara@gpsglobal.cl	954080008	Favor cotizar dispensador.	2017-01-25 13:13:00.258788	nok
82	ricardo azocar reyes	ricardo.azocar@gmail.com	44644667	necesito cotizaciòn de botellones de 20 litros\n	2017-01-25 17:54:16.303681	nok
84	CAROLINA CONTRERAS	carolina.c.ahumada@gmail.com	985743383	SOLICITO COTIZACIÓN DE 50 BIDONES DE AGUA (5 LTS C/U)	2017-01-26 10:31:37.467076	nok
85	Jorge Aliaga Salinas	joaliaga@vtr.net		El dispensador de agua de mesa, es universal?....vale decir puedo colocar bidones de otras marcas, ya que si está en Melipilla no puedo ir a comprar uno o dos bidones, es preferible el distribuidor local en Ñuñoa, que es mi barrio\nCual es el costo y donde lo puedo comprar.\nComo referencia cual es el valor del dispensador de agua frío - calor ?	2017-02-01 18:14:04.104726	nok
86	celia morales	cmorales@agroimec.com	226501215	estimados, favor cotizar dispensador con agua fria y caliente, y 12 bidones de 20 lts mensuales	2017-02-02 17:40:03.86678	nok
87	hector cordero	h.emiliocordero@hotmail.com	+569 78718030	estimados\nquiero comenzar un emprendimiento y quisiera saber los costos de agua embotellada de 500 y 1500 cc con etiqueta personalizada.\nson con gas y sin gas \natento a sus comentarios\n\nhector  	2017-02-03 19:36:32.934158	nok
88					2017-02-14 22:45:16.911551	nok
89	Diego Hidalgo	dhidalgo@cb-consulting.cl	89013523	Estimado;\n\nNecesito una cotización para comprar agua en bidón y las maquinas en las que se usan los bidones para tener el agua fría y caliente.\n\nSaludos cordiales.	2017-02-15 11:58:34.510282	nok
90	SARA ABUSLEME	constructorasyt@yahoo.es	96619 2218	NECESITO COTIZAR DISPENSADORES AGUA FRIA ARRIENDO ..somos empresa	2017-02-15 17:46:41.253271	nok
91	claudio reyes	claudioreyes2810@gmail.com	964257639	ustedes venden el llenado de bidones solamente?, por que poseo una marca de agua propia. atento a su respuesta.	2017-02-18 17:37:27.177563	nok
92	Gabriel Aguirre	gabriel.aguirre.s@gmail.com	965762020	Quiero saber el precio arriendo de dispensadores de agua, ya poseo un garrafon de uds.\n\nSaludos	2017-03-02 21:34:20.742552	nok
93	Lisbeth	guerrero.lisbeth@gmail.com	952506057	Quisiera saber el precio de una máquina dispensadora y 5 botellones.	2017-03-05 15:32:46.453582	nok
94	Juan Ignacio Ovalle	juan.ovalle@ballerina.cl	983621865	Estimados\nQuisiera saber si hacen despachos a la zona de Los Maitenes. Además saber el costo de los botellones y de las máquinas dispensadoras.\n\nSaludos	2017-03-06 21:23:58.782163	nok
95	fernanda	fariasfernanda0@gmail.com	989691407	solicito costo de arriendo y compra de dispensador \nademas costo de botellones y posterior recarga	2017-03-09 18:10:48.623348	nok
97	Nicolás	nicolas@alcaldeproducciones.cl	984671259	Estimados, \n\nnecesito cotizar sus servicios para un evento el día 24 y 25 de Abril en Casa Piedra, la idea que el montaje sea el día 23 en la tarde. \n\nNecesito: \n\n- 16 Dispensadores en Total por Dos Diás. \n\nQuedo atento, \n\nSaludos.	2017-03-21 11:41:05.26086	nok
98	Liselotte Hedegaard	lisa@greenti.cl	+56952433442	Hola,\n\nEstamos una cowork y nos gustaría poner un dispensadora de agua Prana. Seria 30/40 empleados. Puede enviarme una cotización ?\n\nGracias	2017-03-21 15:33:47.880711	nok
99	Reserva Natural Altos de Cantillana	reservanatural@altosdecantillana.com	990964295	Estimados,\n\nQuisiéramos cotizar agua purificada para el sector de La Cayetana, esto queda en ruta G54, a 2 1/2 kms del final del camino pavimentado de Cholqui, Melipilla.\n\nTambién quisiera saber si disponen de camiones aljibes, con agua para ducha, no purificada.\n\nSaludos cordiales	2017-03-22 10:01:25.432839	nok
100	Catalina Caceres	ccaceres@ariztia.com	26378000	Favor enviar cotizacion por 1 dispensador agua fria-caliente anombre de Ariztia Comercial Ltda. Rut. 83614800-2\nGracias.	2017-03-22 12:10:35.018887	nok
101	esteban vera	e@chiloe.club	978795978	hola quisiera comprar envases	2017-03-24 23:04:31.052209	nok
102	SANDRA LORCA	sanlorca@gmail.com	994740845	hola, me gustaria comprar bidones de agua y una maquina dispensadora frio/calor. Tambien me gustaria saber sus valores e informacion de los despacho.\n	2017-03-27 23:02:37.314645	nok
103	Federico Rosano	administracion@afrocafe.cl	56965669586	Quisieramos saber el valor de los botellones dde 20 ls. y las botellas personalizadas de agua, con gas y sin gas. cantidades minimas para encargar y formas de compra y pagos.	2017-03-30 18:13:55.008481	nok
\.


--
-- Data for Name: stock_llenado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY stock_llenado (id_llenador, manana_tarde, llenos, vacios, fecha, llenado_diario) FROM stdin;
1	manana	34	34	2017-03-25 09:12:06.125195	\N
\.


--
-- Data for Name: telefono; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY telefono (rut_cliente, numero, tipo) FROM stdin;
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuario (id, nombre, correo, clave, perfil) FROM stdin;
4	Super User	fcojvh@gmail.com	lalola	administrador
5	Lisbeth Guerrero	guerrero.lisbeth@gmail.com	lalola	despachador
3	llenador	llenado@prana	lalola	llenador
6	Paula Vergara	paulavergara@aguaprana.cl	lalola	administrador
9	David contreras	davidcontreras@aguaprana.cl	davidprana	administrador
1	Francisco Vergara	francisco@isatix.org	lalola	oficina
11				
12	Sandra Lorca	ventas@aguaprana.cl	ventasprana	oficina
\.


--
-- Data for Name: ventas_oficina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ventas_oficina (id_venta, fecha, id_usuario, tipo) FROM stdin;
1	2017-04-08 16:27:40.301936	2	recaga
\.


--
-- Data for Name: ventas_oficina_detalle; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ventas_oficina_detalle (id_venta, id_producto, cantidad) FROM stdin;
\.


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
-- Name: devolucion_envase_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE devolucion_envase_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE devolucion_envase_seq FROM postgres;
GRANT ALL ON SEQUENCE devolucion_envase_seq TO postgres;
GRANT ALL ON SEQUENCE devolucion_envase_seq TO postgres WITH GRANT OPTION;


--
-- Name: direccion; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE direccion FROM PUBLIC;
REVOKE ALL ON TABLE direccion FROM postgres;
GRANT ALL ON TABLE direccion TO postgres;


--
-- Name: pago_devolucion_envase; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE pago_devolucion_envase FROM PUBLIC;
REVOKE ALL ON TABLE pago_devolucion_envase FROM postgres;
GRANT ALL ON TABLE pago_devolucion_envase TO postgres;
GRANT ALL ON TABLE pago_devolucion_envase TO postgres;


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
-- Name: perfil_id_seq	; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE "perfil_id_seq	" FROM PUBLIC;
REVOKE ALL ON SEQUENCE "perfil_id_seq	" FROM postgres;
GRANT ALL ON SEQUENCE "perfil_id_seq	" TO postgres;
GRANT ALL ON SEQUENCE "perfil_id_seq	" TO postgres;


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
-- Name: stock_llenado; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE stock_llenado FROM PUBLIC;
REVOKE ALL ON TABLE stock_llenado FROM postgres;
GRANT ALL ON TABLE stock_llenado TO postgres;
GRANT ALL ON TABLE stock_llenado TO postgres_gestion_prana2 WITH GRANT OPTION;
GRANT ALL ON TABLE stock_llenado TO postgres WITH GRANT OPTION;


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
