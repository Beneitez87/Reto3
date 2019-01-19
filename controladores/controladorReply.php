<?php

session_start();
include_once ("../modelos/ComentarioClass.php");
include_once ("../modelos/ComentarioModel.php");


   $mensaje = filter_input(INPUT_POST, "mensaje");
   $idGrupo = filter_input(INPUT_POST, "idGrupo");
   $usuario = filter_input(INPUT_POST, "usuario");
   
   

   $usuarioComentario= $_SESSION['usuario'];
   $fecha_actual=date("d/m/Y");
   $hora=date("h:i:sa");
   


   $objComentario = new ComentarioModel();
  
 $objComentario->insertarComentario($idGrupo,$usuarioComentario,$mensaje,$fecha_actual,$hora);
 

 

   
 $respuesta = si;
     header("Location: controladorDescripcionCompleta.php?sp_id=".$idGrupo."&respuesta=".$respuesta."&usuario=".$usuario);
   
?>


