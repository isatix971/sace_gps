/* 
 * 
 */
var app = angular.module('saceGps', []);

/**
 * El controlador.
 */
app.controller('CoordenadasCtrl', function($scope, $http, $interval) {
    
    $scope.map = null; 
    $scope.marcador = null;
     
    $scope.initMap = function() {
        $scope.map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center:$scope.marcador
        });
    };
    
    $scope.ponerMarcador = function(lati, longi, extra){
        var markerLATLONG = {lat: lati, lng: longi};
        
        $scope.marcador = new google.maps.Marker({
          position: markerLATLONG,
          map: $scope.map,
          title: extra,
          label: extra
        });
        
        $scope.map.setCenter(markerLATLONG);
        
    };
    
    /**
     * 
     * @returns Define la variable coords que será consumida en la vista.
     */
    $scope.getCoords = function() {
        $http.get("http://192.81.211.131/sace_gps/index.php/main/data?que=coordenadas").then(//acceso al controlador que retorna las coordenadas //FAVOR VALIDAR EL DIRECCIONAMIENTO
                function (response) {//exito
                    //actualiza la variable del scope coords, donde estarán las coordenadas del momento,
                    $scope.coords = response.data; //REVISAR SI ESTARAN O NO LLEGANDO LOS DATOS
                    
                    //AQUI SE CONTRUYE EL MARCADOR, OJO CON EL AJUSTE A LAS COORDENADAS QUE SE HACE MANUALMENTE AQUI, SE DEBE HACER EN EL PHP.
                    $scope.ponerMarcador(Number($scope.coords.x)/100, Number($scope.coords.y)/100, $scope.coords.comentario);
                    
                },
                function(response) {//la segunda funcion parametro de then maneja el error
                    $scope.errorCOORD = response.data;
                }
                        );
    };

    //ejecución del controlador
    $scope.initMap();
    
    /**
     * Define la llamada periodica a getCoords, en milisegundos
     * Guía: http://tutorials.jenkov.com/angularjs/timeout-interval.html
     */
    $interval( function(){ $scope.getCoords(); }, 1500);
    
});