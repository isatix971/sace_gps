
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Carga y Descarga oficina y despachadores</h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" method="post" action="<?php echo base_url(); ?>index.php/main/?fun=almacenarCargaDescarga">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Usuario Despachador/Oficina</label>
                                <div class="col-sm-6">
                                    <select  required = '' id = 'usuario' name = 'usuario' ></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Envases Vacios Retirados</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Cantidad"  required="" id="envVacios" name="envVacios" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Envases LLenos Entregados</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Cantidad" required="" id="envLLenos" name="envLLenos" class="form-control">
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
<script>
    $(document).ready(function () {
        rescatarUsuarios()
    });
    function rescatarUsuarios() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('utils/get_usuarios'); ?>",
            data: {id: " "}
        })
                .done(function (respuesta) {
                    var objetos = jQuery.parseJSON(respuesta);

                    select = document.getElementById('usuario');
                    $('#usuario').empty();

                    for (var i = 0; i < objetos.length; i++) {

                        var opt = document.createElement('option');
                        opt.value = objetos[i].value;
                        opt.innerHTML = objetos[i].label;
                        select.appendChild(opt);
                    }
                });
    }
</script>