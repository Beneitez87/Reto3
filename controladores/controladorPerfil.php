<?php

session_start();
include_once '../modelos/UsuarioClass.php';
include_once '../modelos/UsuarioModel.php';


$nombre = filter_input(INPUT_POST, "nombre");
$apellido1 = filter_input(INPUT_POST, "apellido1");
$apellido2 = filter_input(INPUT_POST, "apellido2");
$fecha = filter_input(INPUT_POST, "fecha");
$direccion = filter_input(INPUT_POST, "direccion");
$correo = filter_input(INPUT_POST, "correo");
$Usuario = $_SESSION['usuario'];
$objPerfil= new UsuarioModel();
$objPerfil->editarPerfil($nombre,$apellido1,$apellido2,$fecha,$direccion,$correo,$Usuario);

session_destroy();
header("Location: ../index.php");
