<section class="main-content-wrapper">
    <section id="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Estado de pedidos</h3>
                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php
                        $flag = '';
                        echo "<table id='pedidos' class='table  table-bordered' cellspacing='0' width='100%'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Cliente</th>";
                        echo "<th>rut</th>";
                        echo "<th>Fecha Pedido</th>";
                        echo "<th>Fecha Estimada</th>";
                        echo "<th>Cantidad</th>";
                        echo "<th>Producto</th>";
                        echo "<th>Detalle</th>";
                        echo "<th>Estado</th>";
                        echo "<th>Despachar</th>";

                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        foreach ($resultado->result_array() as $row):
                            $idMensaje = $row['id'];

                            if ($row['estado'] == 'despacho') {
                                echo "<tr class='success'>";
                            } elseif ($row['estado'] == 'pendiente') {
                                echo "<tr class='danger'>";
                            } else {
                                echo "<tr>";
                            }

                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nombre_rzn_social'] . "</td>";
                            echo "<td>" . $row['rut'] . "-" . $row['dv'] . "</td>";
                            echo "<td>" . $row['fecha_pedido'] . "</td>";
                            echo "<td>" . $row['fecha_estimada'] . "</td>";
                            echo "<td>" . $row['cantidad'] . "</td>";

                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['detalle'] . "</td>";
                            echo "<td>" . $row['estado'] . "</td>";
                            if ($row['estado'] == 'pendiente') {

                                if ($flag != $idMensaje) {
                                    echo "<td><button onClick='asignarPedido(" . $row['id'] . ")'  type='button' class='btn btn-primary' data-toggle='modal' data-target='#asignarDespacho'>Despachar</button></td>";
                                } else {
                                    echo "<td> </td>";
                                }
                            } else {

                                echo "<td> </td>";
                            }
                            echo "</tr>";
                            $flag = $idMensaje;
                        endforeach;
                        echo "</tbody>";
                        echo "</table>";
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </section>
</section>


<div class="modal fade" id="asignarDespacho" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>


<script>
    $(document).ready(function () {
        $('#pedidos').dataTable();
    });


    function asignarPedido(id) {
        html = "";
        html += "<div class='modal-dialog'>";
        html += "<div class='modal-content'>";
        html += "<div class='modal-header'>";
        html += "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
        html += "<h4 class='modal-title' id='myModalLabel'>Asignar Despacho de pedido</h4>";
        html += "</div>";
        html += "<div class='modal-body' id='despachomodal'>";
        
        html += "<form class='form-horizontal' role='form'>";
        html += "<div class='form-group has-warning'>";

        html += "<label class='col-sm-3 control-label'>ID Pedido:  " + id + "</label>";
        html += "<div class='col-sm-7'>";


        html += "<select  required = '' id = 'despachador' name = 'despachador' class = 'form - control input - lg' >";
        html += "</select>";
        html += "</div>";
        html += "</div>";

        html += "<div class='form-group has-warning'>";
        html += "<label class='col-sm-3 control-label'>Ingrese Factura</label>";
        html += "<div class='col-sm-7'>";
        html += "<input type='number' placeholder='Ingrese numero' id='nfactura' name='nfactura'  class='form-control '>";
        html += "</div>";
        html += "</div>";
        html += "<div class='form-group has-warning'>";
        html += "<label class='col-sm-3 control-label'>Ingrese Guia</label>";
        html += "<div class='col-sm-7'>";
        html += "<input type='number' placeholder='Ingrese numero' id='nguia' name='nguia'  class='form-control '>";
        html += "</div>";
        html += "</div>";
        html += "</form>";

        html += "</div>";
        html += "<div class='modal-footer'>";
        html += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>";
        html += "<button type='button' onClick='guardarDespacho(" + id + ")' class='btn btn-primary'>Guardar</button>";

        html += "</div>";
        html += "</div>";
        $('#asignarDespacho').empty();
        $('#asignarDespacho').append(html);
        rescatarDespachador();
    }

    function guardarDespacho(id) {
        var idd = $('#despachador option:selected').val();
        var nfactura = document.getElementById("nfactura").value;
        var nguia = document.getElementById("nguia").value;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('main?update=updateDespacho'); ?>",
            data: {idpedido: id, iddespachador: idd, nfactura: nfactura, nguia:nguia}
        })
                .done(function (respuesta) {
                    alert(respuesta);
                    if (respuesta == 'ok') {
                        location.reload();
                    }
                });
    }

    function rescatarDespachador() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('utils/get_despachadores'); ?>",
            data: {id: " "}
        })
                .done(function (respuesta) {
                    var objetos = jQuery.parseJSON(respuesta);

                    select = document.getElementById('despachador');
                    $('#despachador').empty();

                    for (var i = 0; i < objetos.length; i++) {

                        var opt = document.createElement('option');
                        opt.value = objetos[i].value;
                        opt.innerHTML = objetos[i].label;
                        select.appendChild(opt);
                    }
                });
    }
</script>