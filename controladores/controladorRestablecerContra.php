<?php

include_once '../modelos/UsuarioClass.php';
include_once '../modelos/UsuarioModel.php';

$pass1 = filter_input(INPUT_POST, "pass1");
$pass2 = filter_input(INPUT_POST, "pass2");
$Username = filter_input(INPUT_POST, "Username");



if($pass1 === $pass2){
    
    
$options = ['cost'=>15];
$passwordEncripted = password_hash($pass1,PASSWORD_BCRYPT, $options);


$objRestablecer= new UsuarioModel();

$objRestablecer->restablecer($passwordEncripted,$Username);

header("Location: ../index.php");

    
}else{
    
    
    
    
}
