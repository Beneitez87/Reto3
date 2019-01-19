$(document).ready(function(){
	

    $("#Perfil").hide();
    $("#AnadirGrupo").hide();
    $("#ModificarGrupo").hide();


$("#Login").click(function Login(){
   

     $("#identificar").hide();
   
   

});

$("#linkPerfil").click(function miPerfil(){
    
//    var respuesta;
//var r = confirm("Estas seguro de editar tu perfil?");
//if (r === true) {
//    respuesta = "Si";
//} else {
//    respuesta = "No";
//}
//
//if(respuesta === "Si"){
//     $("#Perfil").show();
//}
 $("#Perfil").show();
   
});





$(".BorrarGrupo").click(function BorrarGrupo(){
    
    var respuesta;
var r = confirm("Estas seguro de borrar el grupo?");
if (r === true) {
   return true;
} else {
    return false;
}


   
});



$(".nav-anadir").click(function AñadirGrupo(){
   
 $("#AnadirGrupo").show();
   
   

});


$(".nav-modificar").click(function ModificarGrupo(){
    
        $("#ModificarGrupo").show();
    
});


//$("#guardar").click(function guardarPerfil(){
//	
//var respuesta;
//var r = confirm("Estas apunto de cambiar la configuracion de el perfil, si eliges la opcion 'SI' se cerrara la sesion para guardar los cambios");
//if (r === true) {
//    respuesta = true;
//} else {
//    respuesta = false;
//}
//
//return respuesta;
//
//
//
//	
//	
//});




 
 });
