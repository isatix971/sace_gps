
<script>
    //jquery

    $(function () {
//        $("#idPedido").autocomplete({
//            source: "<?php echo site_url('utils/get_pedidosDespachador'); ?>" // path to the get_birds method
//        });
        buscarPedidosDespacho();

    });
    function buscarPedidosDespacho() {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('utils/get_pedidosDespachador'); ?>",
            data: {id: <?php echo $_SESSION["id"]; ?>}
        })
                .done(function (respuesta) {
                    var objetos = jQuery.parseJSON(respuesta);

//                    console.log(respuesta);

                    select = document.getElementById('idDespacho');
                    $('#idDespacho').empty();

                    for (var i = 0; i < objetos.length; i++) {

                        var opt = document.createElement('option');
                        opt.value = objetos[i].value;
                        opt.innerHTML = objetos[i].label;
                        select.appendChild(opt);
                    }
                });
    }

</script>
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Entrega de pedido</h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" method="post" action="<?php echo base_url(); ?>index.php/main/?fun=almacenarDespacho">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Pedido</label>
                                <div class="col-sm-6">
<!--                                    <input type="text" placeholder="nombre de cliente" required="" id="nomEmpresa" name="nomEmpresa" class="form-control" value="<?php echo $_SESSION["id"]; ?>">                                        -->
                                    <select  required="" id="idDespacho" name="idDespacho" class="form-control input-lg">
                                    </select>                                
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">DETALLES</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Envases vacios devueltos</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Envases vacios devueltos" required="" id="b20devueltos" name="b20devueltos" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Forma de pago</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input class="icheck" type="radio" checked="" value="ok" name="estadopago">Pagado</label>
                                    <label class="radio-inline">
                                        <input class="icheck" type="radio" value="nok" name="estadopago">Pago pendiente</label>
<!--                                    <label class="radio-inline">
                                        <input class="icheck" type="radio" name="rad1">Option 3</label>-->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comentarios</label>
                                <div class="col-sm-6">
                                    <textarea  type="number" placeholder="Comentarios" required="" id="comentarios" name="comentarios" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-8 col-sm-10">
                                    <input class="btn btn-primary" type="submit" value="Enviar" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>
</section>

