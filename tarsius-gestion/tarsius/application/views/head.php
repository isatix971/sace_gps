<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRANA CONTROL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>content-lab/assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>content-lab/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>content-lab/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>content-lab/assets/css/simple-line-icons.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?= base_url(); ?>content-lab/assets/css/animate.css">
    <!-- Switchery -->
    <link rel="stylesheet" href="<?= base_url(); ?>content-lab/assets/plugins/switchery/switchery.min.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="<?= base_url(); ?>content-lab/assets/css/main.css">
    <!-- alertify -->
    <link rel="stylesheet" href="<?= base_url(); ?>content/css/alertify.core.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>content/css/alertify.default.css" id="toggleCSS" />

    <!-- DataTables-->
    <link rel="stylesheet" href="<?= base_url(); ?>content-lab/assets/plugins/dataTables/css/dataTables.css">

    <!--    css para autocompletar-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<!--    <link rel="stylesheet" href="<?= base_url(); ?>content/css/jquery-ui.css" id="" />-->


    <!-- Feature detection -->
<!--     <script src="<?= base_url(); ?>content-lab/assets/js/modernizr-2.6.2.min.js"></script>-->

    <script src="<?= base_url(); ?>content/js/jquery.js"></script>

    <script src="<?= base_url(); ?>content/js/jquery-ui.js"></script>
<!--    <script src="<?= base_url(); ?>content/js/angular.min.js"></script>-->
    <script src="<?= base_url(); ?>content/js/alertify.min.js"></script>

    <script src="<?= base_url(); ?>content-lab/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>content-lab/assets/plugins/navgoco/jquery.navgoco.min.js"></script>
    <script src="<?= base_url(); ?>content-lab/assets/plugins/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url(); ?>content-lab/assets/plugins/switchery/switchery.min.js"></script>
    <script src="<?= base_url(); ?>content-lab/assets/js/application.js"></script>


    <script src="<?= base_url(); ?>content-lab/assets/plugins/dataTables/js/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>content-lab/assets/plugins/dataTables/js/dataTables.bootstrap.js"></script>


    <script src="<?= base_url(); ?>content/js/validarut.js"></script>

    <script>
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);


//fecha de entrega
        $(function () {
            $("#fechaEstimada").datepicker({
                dateFormat: 'mm-dd-yy',
                language: 'es'
            }).val();
        });


        //autocompletar de cliente o empresa

        $(function () {
            $("#nomEmpresa").autocomplete({
                source: "<?php echo site_url('utils/get_clientes'); ?>" // path to the get_birds method
            });

        });
//*******************************************
        function validarRut(element) {

            $var = Rut($('#' + element).val());
            document.getElementById(element).value = $var;
//            alert($var);
        }

//        seccion para correr script en el inicio de la carga del programa
        $(document).ready(function () {

        });

        function validarClienteRut(element) {
            $var = Rut($('#' + element).val());
            if ($var != false) {
                document.getElementById(element).value = $var;

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('utils/get_rut_cliente_almacenado'); ?>",
                    data: {rut: $var}
                })
                        .done(function (respuesta) {
                            if (respuesta == "true") {
                                $('#botoningresacliente').prop('disabled', false);
                            } else {
                                alertify.error("EL rut ya se encuentra registrado");
                                $('#botoningresacliente').prop('disabled', true);

                            }
                        });
            } else {
                document.getElementById(element).value = '';

                $('#botoningresacliente').prop('disabled', true);
            }
        }


        function validarContactoRut(element) {
            $var = Rut($('#' + element).val());
            if ($var != false) {
                document.getElementById(element).value = $var;

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('utils/get_rut_contacto_almacenado'); ?>",
                    data: {rut: $var}
                })
                        .done(function (respuesta) {
                            if (respuesta == "true") {
                                $('#botoningresacliente').prop('disabled', false);
                            } else {
                                alertify.error("EL rut ya se encuentra registrado");
                                $('#botoningresacliente').prop('disabled', true);

                            }
                        });
            } else {
                document.getElementById(element).value = '';

                $('#botoningresacliente').prop('disabled', true);
            }
        }

    </script>


</head>