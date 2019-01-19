var MyApp = angular.module('MyApp', []);
MyApp.controller('miControlador', function($scope){
   
    
    
       $scope.login=function(){
             
           $scope.verFormulario="si";
           $scope.formulario="si";
           $scope.verRegistro="no";
           $scope.olvidada="no";
           $scope.style={
              
               
           };
           
       };
       
       $scope.contrasenaOlvidada=function (){
           $scope.formulario="no";
           $scope.olvidada="si";
           
       };
       
       $scope.cancelar=function (){
           $scope.verFormulario="no";
           $scope.verRegistro="no";
       };
       $scope.registro=function(){
           $scope.verRegistro="si";
           $scope.verFormulario="no";
       };
       
       $scope.cerrar=function (){
           $scope.myStyle={
               display: 'none'
           };
       };
       
       $scope.responder=function (){
           $scope.verResponder="si";
           
       }
       
      
      
});

$(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
                  $('#nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
                  $('#nav').removeClass('black');
            }
      })
      
      

    
