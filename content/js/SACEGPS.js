/* 
 * 
 */
var app = angular.module('saceGps', []);

/**
 * El controlador.
 */
app.controller('CoordenadasCtrl', function($scope, $http, $interval) {
    
    /**
     * 
     * @returns Define la variable coords que será consumida en la vista.
     */
    $scope.getCoords = function() {
        $http.get("http://192.81.211.131/sace_gps/index.php/main/data?que=coordenadas").then(//acceso al controlador que retorna las coordenadas //FAVOR VALIDAR EL DIRECCIONAMIENTO
                function (response) {//exito
                    //actualiza la variable del scope coords, donde estarán las coordenadas del momento,
                    $scope.coords = response.data; //REVISAR SI ESTARAN O NO LLEGANDO LOS DATOS
                    //falta que actualice el marcador del mapa
                    
                },
                function(response) {//la segunda funcion parametro de then maneja el error
                    $scope.errorCOORD = response.data;
                }
                        );
    };


    //ejecución del controlador
    
    /**
     * Define la llamada periodica a getCoords, en milisegundos
     * Guía: http://tutorials.jenkov.com/angularjs/timeout-interval.html
     */
    $interval( function(){ $scope.getCoords(); }, 1500);
    
});