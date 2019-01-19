<?php


require '../lib/PHPMailer.php';
require '../lib/SMTP.php';

include_once '../modelos/UsuarioClass.php';
include_once '../modelos/UsuarioModel.php';

$Usuario= filter_input(INPUT_POST, "Usuario");
$contra= filter_input(INPUT_POST, "pwd");
$Nombre= filter_input(INPUT_POST, "Nombre");
$Apellido1= filter_input(INPUT_POST, "Apellido1");
$Apellido2= filter_input(INPUT_POST, "Apellido2");
$Fecha= filter_input(INPUT_POST, "Fecha");
$Direccion= filter_input(INPUT_POST, "Direccion");
$Correo= filter_input(INPUT_POST, "Correo");
$Privilegios= "Usuario";

$options = ['cost'=>15];
$passwordEncripted = password_hash($contra,PASSWORD_BCRYPT, $options);






$objRegistro= new UsuarioModel();


$objRegistro->registro($Usuario,$passwordEncripted,$Nombre,$Apellido1,$Apellido2,$Fecha,$Direccion,$Correo,$Privilegios);

 

$mail=new PHPMailer();
            $mail->SMTPSecure='tls';
            $mail->Host="smtp.live.com";
            $mail->Port=587;
            $mail->IsSMTP();
            $mail->SMTPAuth=true;
            
            $mail->Username="ticketZornotza@hotmail.com";  
            $mail->Password="Zornotza1234";             
            
            $mail->AddAddress($Correo);
            $mail->FromName="Administrador de Zornotza Ticket";
            $mail->Subject="Bienvenido";
            $mail->Body="Hola te deseamos la bienvenida a Zornotza Ticket, puedes mirar los grupos y si estas interesado puedes reservar una entrada para un concierto, el dinero se paga en efectivo";
            
            $mail->From=$mail->Username;
            $confirm=$mail->Send();
if(!$confirm){
    
  //  echo 'Error: ' . $mail->ErrorInfo;
    
    
    
} else{
    
 //   echo "Mensaje Enviado";
    
}


header("Location: ../index.php?registro=error");

 