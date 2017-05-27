
<section class="main-content-wrapper">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="#">Dashboard</a>
                    </li>
                    <li>Maps</li>
                    <li class="active">GPS</li>
                </ul>
                <!--breadcrumbs end -->
                <h1 class="h1">Monitoreo GPS</h1>
            </div>
        </div>

        <div class="row" ng-app="saceGps" ng-controller="CoordenadasCtrl"> <!-- define el scope de la app-controlador a este div -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Equipo rastreado</h3>
                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="textual_vars_angular"> <!-- AQUI LOS TEXTITOS PARA VER EL VALOR DE LAS VARIABLES SACADAS O EL POTENCIAL MENSAJE DE ERROR -->
                            <span id="coordValue">{{coords}}</span>
                            <span id="errorMsg">{{errorCOORD}}</span>
                        </div>
                        <div id="map"></div>
                    </div>
                </div>
            </div>


        </div>
        
        <script src="<?= base_url(); ?>content/js/SACEGPS.js"></script> <!-- Usando angular, puesto aqui para que se ejecute en este momento, me basé en un ejemplo -->


    </section>
</section>


