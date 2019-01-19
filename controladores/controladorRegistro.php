<?php

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




header("Location: ../index.php");

 