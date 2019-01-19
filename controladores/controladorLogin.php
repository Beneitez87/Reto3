<?php
session_start();
include_once ("../modelos/UsuarioClass.php");
include_once ("../modelos/UsuarioModel.php");

$Usuario = filter_input(INPUT_POST, "nombre");
$Contra = filter_input(INPUT_POST, "pwd");
$Check= filter_input(INPUT_POST, "recordar");


$objLogin= new UsuarioModel();
$objLogin->Login($Usuario);
$listaLogin = $objLogin->getList();



if($Check === "on"){
    
    
    setcookie("cook_user",$Usuario, time()+7200,"/" );
        
    
}


foreach($listaLogin as $objLogin){
   
  $UsuarioLista=$objLogin->getUsername();
  $ContraLista=$objLogin->getPass();
    
  
  
}


 

 if (password_verify($Contra, $ContraLista)) {
     
      // echo '¡La contraseña es válida!';
       
       
          if($Usuario == $UsuarioLista || $Contra == $ContraLista){
              
              
              
                // echo '¡Login Correcto!';
              
          
                  if ($objLogin->getUsername() != null) {
   

    
    $_SESSION['loggedin'] = true;
    $_SESSION['usuario'] = $objLogin->getUsername();
    $_SESSION['nombre'] =  $objLogin->getNombre();
    $_SESSION['contrasena'] =  $objLogin->getPass();
    $_SESSION['apellido1'] =  $objLogin->getApellido1();
    $_SESSION['apellido2'] =  $objLogin->getApellido2();
    $_SESSION['fecha'] =  $objLogin->getFechaNacimiento();
    $_SESSION['direccion'] =  $objLogin->getDireccion();
    $_SESSION['correo'] =  $objLogin->getCorreo();
    $_SESSION['privilegios'] =  $objLogin->getPrivilegios();   
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60); 
    
    
    
   
} 
              
       header("Location: ../index.php");      
              
          }
     
 }else{
     
    
     header("location:../index.php?intento=error");

    

    //echo '<script>alert ("No encontramos ningún usuario con estos datos.\nPor favor, vuelva a intentarlo.");</script>';
 }
