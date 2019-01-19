var app= angular.module("miApp",[]);

app.controller("miControlador",["$scope","$http",function($scope,$http){
    $scope.ListaArticulo=[];
    var misdatos={
        method:'GET',
        url:'JSON/datosCombo1.json'
    }
    
    var response=$http(misdatos);
    response.success(function(data){
       
        $scope.ListaArticulo=data;
        
    });
 
 
    $http.get('JSON/datoscombo_libro.json').success(function(data){
       $scope.ListaLibro=data;
        
    });
       
    $scope.miTipoSeleccionado=null;
    $scope.miLibroSeleccionado=null;
    $scope.combo2=[];
     
    $scope.seleccionarCombo1 = function(){
         alert($scope.miTipoSeleccionado.tipo);
        switch ($scope.miTipoSeleccionado.tipo){
              
            case 'libro':
                $scope.combo2=$scope.ListaLibro;
               
                break;
                
            case'comic':
                $http.get('JSON/datoscombo_comic.json').success(function(data){
                   $scope.ListaComic = data; 
                    $scope.combo2=$scope.ListaComic;
                });
                
                break;
            case 'revista': 
                $http.get('JSON/datoscombo_revista.json').success(function(data){
                   $scope.ListaRevista = data; 
                    });
                    $scope.combo2=$scope.ListaRevista;
                break;
            
                    
                
        }
    }
    
}]);