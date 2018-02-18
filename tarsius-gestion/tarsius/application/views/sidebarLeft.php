<nav class="sidebar sidebar-left">
    <h5 class="sidebar-header">Navigación</h5>
    <ul class="nav nav-pills nav-stacked">
        <?php
        if ($_SESSION["perfil"] == 'administrador') {
            ?>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-wrench"></i> Herramientas
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?select=verCotizaciones">Solicitudes de cotizaciones</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?op=cotizador">Cotizador</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?op=agregarusuario">Agregar Usuarios</a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="icon-user"></i> Clientes
                </a>
                <ul class="nav-sub">

                    <li><a href="<?= base_url(); ?>index.php/main?op=agregarcliente">Agregar Clientes</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?op=contactoCliente">Agregar Contacto Clientes</a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-truck"></i> Pedidos
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=pedido">Realizar Pedidos</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?select=verPedidos">Estado Pedidos</a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-list-alt"></i> Facturas/Guias
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=verFacturas">Ver Facturas y guias</a>
                    </li>
                    <li><a href="http://www.sii.cl/factura_electronica/factura_sii/factura_sii.htm">Facturas Electronicas</a>
                    </li>


                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-shopping-cart"></i> Finalizar Pedidos
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=entregaDespacho">Entregar Pedido</a>
                    </li>


                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa  fa-tint"></i>Stock Bidones
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=stockManana">Registrar Mañana</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?select=stockTarde">Registrar Tarde</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?select=cargaDescarga">Carga y Descarga</a>
                    </li>
                </ul>
            </li>

            <?php
        }

        if ($_SESSION["perfil"] == 'oficina') {
            ?>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-wrench"></i> Herramientas
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?select=verCotizaciones">Solicitudes de cotizaciones</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?op=cotizador">Cotizador</a>
                    </li>



                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="icon-user"></i> Clientes
                </a>
                <ul class="nav-sub">

                    <li><a href="<?= base_url(); ?>index.php/main?op=agregarcliente">Agregar Clientes</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?op=contactoCliente">Agregar Contacto Clientes</a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-truck"></i> Pedidos
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=pedido">Realizar Pedidos</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?select=verPedidos">Estado Pedidos</a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-list-alt"></i> Facturas/Guias
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=verFacturas">Ver Facturas y guias</a>
                    </li>
                    <li><a href="http://www.sii.cl/factura_electronica/factura_sii/factura_sii.htm">Facturas Electronicas</a>
                    </li>

                </ul>
            </li>

            <?php
        }

        if ($_SESSION["perfil"] == 'despachador') {
            ?>

            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-truck"></i> Pedidos
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?select=verPedidos">Estado Pedidos</a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-list-alt"></i> Facturas/Guias
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=verFacturas">Ver Facturas y guias</a>
                    </li>


                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-shopping-cart"></i> Finalizar Pedidos
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=entregaDespacho">Entregar Pedido</a>
                    </li>

                </ul>
            </li>
            <?php
        }

        if ($_SESSION["perfil"] == 'llenador') {
            ?>

            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa  fa-tint"></i>Stock Bidones
                </a>
                <ul class="nav-sub">
                    <li><a href="<?= base_url(); ?>index.php/main?op=stockManana">Registrar Mañana</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?select=stockTarde">Registrar Tarde</a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/main?select=cargaDescarga">Carga y Descarga</a>
                    </li>
                </ul>
            </li>

            <?php
        }
        ?>


    </ul>
</nav>