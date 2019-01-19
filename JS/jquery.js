$(document).ready(function(){
	

    $("#Perfil").hide();

$("#Registrar").click(function Registro(){
	

alert("Te has registrado con exito");
	
	
});

$("#Login").click(function Login(){
   

     $("#identificar").hide();
   
   

});

$("#linkPerfil").click(function miPerfil(){
    
    var respuesta;
var r = confirm("Estas seguro de editar tu perfil?");
if (r === true) {
    respuesta = "Si";
} else {
    respuesta = "No";
}

if(respuesta === "Si"){
     $("#Perfil").show();
}
   
});




$("#guardar").click(function guardarPerfil(){
	
var respuesta;
var r = confirm("Estas apunto de cambiar la configuracion de el perfil, si eliges la opcion 'SI' se cerrara la sesion para guardar los cambios");
if (r === true) {
    respuesta = true;
} else {
    respuesta = false;
}

return respuesta;



	
	
});




 
 });
