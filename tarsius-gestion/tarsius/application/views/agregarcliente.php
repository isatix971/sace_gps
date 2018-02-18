
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingreso de Clientes</h3>

                    </div>                    
                    <div class="panel-body">
                        <form class="form-horizontal form-border" name="ingrescliente" method="post" action="<?php echo base_url();?>index.php/main/?fun=almacenarCliente">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Razón social</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Ingrese Razón social" required="" id="nomEmpresa" name="nomEmpresa" class="form-control">                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Rut</label>
                                <div class="col-sm-6">
                                    <input onblur="validarClienteRut('rutEmpresa')" type="text" placeholder="Ingrese Rut" required="" id="rutEmpresa" name="rutEmpresa" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Giro</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Ingrese Giro" id="giro" name="giro" required="" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefono</label>
                                <div class="col-sm-6">
                                    <input maxlength="9" type="number" placeholder="9 digitos" required="" id="telefono" name="telefono" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Direccion</label>
                                <div class="col-sm-3">
                                    <label class="control-label">Calle </label>
                                    <input type="text" id="calle" name="calle" placeholder="Ingrese calle" class="form-control" >
                                </div>
                                <div class="col-sm-1">
                                    <label class="control-label">Numero </label>
                                    <input type="text" id="numero" name="numero" placeholder="Ingrese numero" class="form-control" >
                                </div>
                                <div class="col-sm-1">
                                    <label class="control-label">Depto. </label>
                                    <input type="number" id="depto" name="depto" placeholder="Ingrese Departamento" class="form-control" >
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label">Ciudad </label>
                                    <input type="text" id="ciudad" name="ciudad" placeholder="Ingrese ciudad" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CONTACTO</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombre</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Ingrese Nombre" required="" id="nombreContacto" name="nombreContacto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Correo</label>
                                <div class="col-sm-6">
                                    <input type="email" placeholder="Ingrese Correo" required="" id="correoContacto" name="correoContacto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Rut</label>
                                <div class="col-sm-6">
                                    <input onblur="validarContactoRut('rutContacto')" type="text" placeholder="Ingrese Rut" required="" id="rutContacto" name="rutContacto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefono</label>
                                <div class="col-sm-6">
                                    <input maxlength="9" type="number" placeholder="9 digitos" required="" id="telefonoContacto" name="telefonoContacto" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-8 col-sm-10">
                                    <input class="btn btn-primary" id="botoningresacliente" type="submit" value="Enviar" >
<!--                                    <button type="" class="btn btn-primary" onclick="validar()">Enviar</button>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>
</section>

