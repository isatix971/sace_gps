<script>

    function buscarContacto() {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('utils/get_contactos'); ?>",
            data: {id: $('#nomEmpresa').val()}
        })
                .done(function (respuesta) {
                    var objetos = jQuery.parseJSON(respuesta);

                    select = document.getElementById('contactoCliente');
                    $('#contactoCliente').empty();

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
                        <h3 class="panel-title">Ingreso de Pedidos</h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" method="post" action="<?php echo base_url(); ?>index.php/main/?fun=almacenarPedido">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cliente</label>
                                <div class="col-sm-6">
                                    <input type="text"onblur="buscarContacto()" placeholder="Nombre / Razon social" id="nomEmpresa" name="nomEmpresa" class="form-control ui-autocomplete-input"  />
                                    <!--<input type="text" placeholder="Ingrese Razón social" required="" id="nomEmpresa" name="nomEmpresa" class="form-control">                                        -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Contacto</label>
                                <div class="col-sm-6">
                                    <select  required="" id="contactoCliente" name="contactoCliente" class="form-control input-lg">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Bidones 20 L</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Ingrese Cantidad" id="b20" name="b20"  class="form-control ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dispensador Plastico</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Ingrese Cantidad" id="dispensador" name="dispensador" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Maquina Frio-Calor</label>
                                <div class="col-sm-3">
                                    <label class="control-label">Cantidad </label>
                                    <input type="number" id="mqfc" name="mqfc" placeholder="Ingrese Cantidad" class="form-control" >
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Modalidad </label>
                                    <select  required="" id="mqfcDetalle" name="mqfcDetalle" class="form-control input-lg">
                                        <option value="arriendo">Arriendo</option>
                                        <option value="comodato">En como dato</option>
                                        <option value="venta">Venta</option>
                                    </select>                                
                                </div>

                            </div>
                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Fecha estimada de entrega</label>
                                <div class="col-sm-6">
                                    <input required="" type="text" id="fechaEstimada" name="fechaEstimada">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-8 col-sm-10">
                                    <input class="btn btn-primary" type="submit" value="Enviar" onclick="validar()">
                                    <!--                                    <button type="" class="btn btn-primary" onclick="validar()">Enviar</button>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>
</section>

