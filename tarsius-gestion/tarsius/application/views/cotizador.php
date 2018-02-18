<?php
if (isset($postData)) {
    //echo "<h1>VIENE LA POST DATAAAAAAAA</h1>".   $postData[2]; //debug
    /*
     * 0 - > id
     * 1 - > nombre
     * 2 - > correo
     * 3 - > telefono
     * 4 - > fecha
     * 5 - > mensaje
     */
}
?>
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Envio de cotizaciones</h3>
                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" method="post" action="<?php echo base_url(); ?>index.php/pdf_ci">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombre de empresa</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Ingrese Nombre" required="" id="nomEmpresa" name="nomEmpresa" class="form-control">                                        </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombre de contacto</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Ingrese Nombre" required="" id="nomContacto" name="nomContacto" class="form-control" value="<?php echo set_value('nomContacto', @$postData[1]) ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Correo</label>
                                <div class="col-sm-6">
                                    <input type="email" placeholder="Ingrese e-mail" id="correo" name="correo" required="" class="form-control" value="<?php echo set_value('correo', @$postData[2]) ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefono</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="XX-XXXX XXX" required="" id="telefono" name="telefono" class="form-control" value="<?php echo set_value('telefono', @$postData[3]) ?>">                                        </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Botellones 20L</label>
                                <div class="col-sm-3">
                                    <label class="control-label">Cantidad: </label>
                                    <input type="text" id="b20cantidad" name="b20cantidad" placeholder="Ingrese datos" class="form-control" >
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Precio Neto: </label>
                                    <input type="text" id="b20precio" name="b20precio" placeholder="Ingrese datos" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Botellas 10L</label>
                                <div class="col-sm-3">
                                    <label class="control-label">Cantidad: </label>
                                    <input type="text" id="b10cantidad" name="b10cantidad" placeholder="Ingrese datos" class="form-control" >
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Precio Neto: </label>
                                    <input type="text" id="b10precio" name="b10precio" placeholder="Ingrese datos" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Dispensador frio-caliente</label>
                                <div class="col-sm-3">
                                    <label class="control-label">Cantidad</label>
                                    <input type="text" id="dispencant" name="dispencant" placeholder="Ingrese datos" class="form-control" >                                        
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Modalidad</label>
                                    <select class="form-control input-lg" id="dispenmoda" name="dispenmoda">
                                        <option value="1" >Arriendo Mensual</option>
                                        <option value="2" >Venta</option>
                                        <option value="3" >En comodato</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Precio Neto: </label>
                                    <input type="text" id="dispenprecio" name="dispenprecio" placeholder="Ingrese datos" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Dispensador Plastico</label>
                                <div class="col-sm-3">
                                    <label class="control-label">Cantidad</label>
                                    <input type="text" id="dispenplasticocantidad" name="dispenplasticocantidad" placeholder="Ingrese datos" class="form-control" >                                        
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Precio Neto: </label>
                                    <input type="text" id="dispenplasticoprecio" name="dispenplasticoprecio" placeholder="Ingrese datos" class="form-control" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Llaves de dispensador</label>
                                <div class="col-sm-3">
                                    <label class="control-label">Cantidad: </label>
                                    <input type="text" id="llavecantidad" name="llavecantidad" placeholder="Ingrese datos" class="form-control" >
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Precio Neto: </label>
                                    <input type="text" id="llaveprecio" name="llaveprecio" placeholder="Ingrese datos" class="form-control" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Comentarios</label>
                                <div class="col-sm-6">
                                    <label class="control-label">Comentarios</label>                                 
                                    <textarea rows="8" id="comentarios" name="comentarios" placeholder="Ingrese comentarios" class="form-control"><?php echo set_value('comentarios', "Comentarios: \n- - - - - - - - -\n" . @$postData[5]) ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Solo enviar mensaje sin cotizacion</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input class="icheck" type="radio" checked="" value="ok" name="adjunto">Adjuntar</label>
                                    <label class="radio-inline">
                                        <input class="icheck" type="radio" value="nok" name="adjunto">No Adjuntar</label>
                                </div>
                            </div>

                            <?php if (isset($postData)) { //id de solicitud de cotizacion  ?>
                                <input type="hidden" name="idSolicitudCotizacion" value="<?php echo set_value('idSolicitudCotizacion', @$postData[0]) ?>" /> 
                            <?php } //find de id de solicitud de cotizacion  ?> 


                            <div class="form-group">
                                <div class="col-sm-offset-8 col-sm-10">
                                    <input class="btn btn-primary" type="submit" value="Enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
