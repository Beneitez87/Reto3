var MyApp = angular.module('MyApp', []);
MyApp.controller('miControlador', function($scope){
    $scope.verFormulario="no";
    
       $scope.login=function(){
           $scope.verFormulario="si";
       };
       $scope.registro=function(){
           $scope.verRegistro="si";
           $scope.verFormulario="no";
       };
       
       
      
      
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
            }

            else {
                  $('nav').removeClass('black');
            }
      });
      
      
window.addEventListener("load", function () {
    var flechaWork = document.getElementById('flecha_work');
    var work = document.getElementById("work2");
    flechaWork.addEventListener("click", function () {
        if (work.style.left === "40%") {
            work.style.left = "-80%";
            work.style.transition = "all 0.5s";
        } else {
            work.style.left = "40%";
            work.style.transition = "all 0.5s";
        }
    });
});      
      
      
      
      

    
