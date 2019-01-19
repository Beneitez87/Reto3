<?php
session_start();
$fecha = filter_input(INPUT_POST, "Fecha");
$idConciertoSala = filter_input(INPUT_POST, "idConciertoSala");
$Usuario = $_SESSION['usuario'];



include '../vistas/vistaCompra.php';

