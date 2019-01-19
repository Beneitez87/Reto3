<?php


require '../lib/PHPMailer.php';
require '../lib/SMTP.php';

include_once ("../modelos/UsuarioClass.php");
include_once ("../modelos/UsuarioModel.php");

$correo = filter_input(INPUT_POST, "recuperarContraseña");



$objCorreo= new UsuarioModel();

$objCorreo->BuscarCorreo($correo);

$ListaCorreo = $objCorreo->getList();

foreach($ListaCorreo as $objCorreo){
   
$CorreoRecibido=$objCorreo->getPass();
$Username= $objCorreo->getUsername();
    
  

}



include_once '../vistas/CodigoView.php';


//$mail = new PHPMailer();
//$mail->SMTPSecure = "tls";
//$mail->Host = "smtp.live.com";
//$mail->Port = 587;
//$mail->IsSMTP();
//$mail->SMTPAuth = true;
//$mail->Username = "ticketZornotza@hotmail.com";
//$mail->Password = "Zornotza1234";
//$mail->AddAddress($correo);
//$mail->FromName = "Administrador de Zornotza Ticket";
//$mail->Subject = "Copie esta contraseña y ponla en la casilla de verificacion";
//$mail->Body = $CorreoRecibido;
//$mail->From = $mail->Username;
//$confirm=$mail->Send();

 $mail=new PHPMailer();
            $mail->SMTPSecure='tls';
            $mail->Host="smtp.live.com";
            $mail->Port=587;
            $mail->IsSMTP();
            $mail->SMTPAuth=true;
            
            $mail->Username="ticketZornotza@hotmail.com";  
            $mail->Password="Zornotza1234";             
            
            $mail->AddAddress($correo);
            $mail->FromName="Administrador de Zornotza Ticket";
            $mail->Subject="Codigo de Verificacion";
            $mail->Body=$CorreoRecibido;
            
            $mail->From=$mail->Username;
            $confirm=$mail->Send();
if(!$confirm){
    
  //  echo 'Error: ' . $mail->ErrorInfo;
    
    
    
} else{
    
 //   echo "Mensaje Enviado";
    
}