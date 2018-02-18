
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registro Stock Envases Tarde</h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" method="post" action="<?php echo base_url(); ?>index.php/main/?fun=almacenarStockTarde">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Envases Vacios</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Cantidad"  required="" id="envVacios" name="envVacios" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Envases LLenos</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Cantidad" required="" id="envLLenos" name="envLLenos" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Total de envases llenados</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Cantidad" required="" id="llenado" name="llenado" class="form-control">
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

