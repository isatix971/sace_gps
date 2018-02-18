<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">buscar facturas de cliente</h3>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal form-border" method="post" action="<?php echo base_url(); ?>index.php/main/?select=verFacturas">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cliente</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Nombre / Razon social" id="nomEmpresa" name="nomEmpresa" class="form-control ui-autocomplete-input"  />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-8 col-sm-10">
                                    <input class="btn btn-success" type="submit" value="Consultar" >
                                </div>
                            </div>
                        </form>



                        <?php
                        if (isset($resultado)) {
                            echo "<table id='facturas' class='table  table-bordered' cellspacing='0' width='100%'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Id Pedido</th>";
                            echo "<th>Cliente</th>";
                            echo "<th>rut</th>";
                            echo "<th>Fecha Pedido</th>";
                            echo "<th>Fecha entrega</th>";
                            echo "<th>Nombre Contacto</th>";
                            echo "<th>Factura</th>";
                            echo "<th>Guia</th>";
                            echo "<th>Estado pago</th>";

                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            foreach ($resultado->result_array() as $row):
//nombre_rzn_social	rut	dv	nombre	id	fecha_pedido	fecha_entrega	factura	guia	estado_pago
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nombre_rzn_social'] . "</td>";
                                echo "<td>" . $row['rut'] . "-" . $row['dv'] . "</td>";
                                echo "<td>" . $row['fecha_pedido'] . "</td>";
                                echo "<td>" . $row['fecha_entrega'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";

                                echo "<td>" . $row['factura'] . "</td>";
                                echo "<td>" . $row['guia'] . "</td>";
                                if ($row['estado_pago'] == "ok") {
                                    echo "<td> <span class='label label-success'>Pagado</span> </td>";
                                } else {
                                    echo "<td> <span class='label label-danger'>Pendiente</span> </td>";
                                }

                                echo "</tr>";
                            endforeach;
                            echo "</tbody>";
                            echo "</table>";
                        }
                        ?>

                    </div>
                </div>

            </div>

    </section>
</section>
<script>
    $(document).ready(function () {
        $('#facturas').dataTable();
    });
</script>