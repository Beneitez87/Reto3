
var EntradaPrecio = 50;
var Contador = 0;
var Total = 0;
function sumar(){
    
     Contador = Contador+1;
Total = EntradaPrecio * Contador;
    
      document.getElementById("total").innerHTML = Total;
      document.getElementById("cantidad").innerHTML = Contador;
      
       document.getElementById("euro").value = Total;
       document.getElementById("cantidadTotal").value = Contador;
     

    
}


function restar(){
    
    
   Contador = Contador-1;
Total = EntradaPrecio * Contador;

    if(Total < 0){
        Total = 0;
       
        
    }
    
     if(Contador < 0){
        Contador = 0;
       
        
    }
      document.getElementById("total").innerHTML = Total;
    document.getElementById("cantidad").innerHTML = Contador;
}





function agrandar(){
    
    
    
   perfil = document.getElementById("total").setAttribute("height", "80px");
    
     perfil.style.width = "400px";
    
}