<?php

include_once ("../modelos/EntradaClass.php");
include_once ("../modelos/EntradaModel.php");

$euro = filter_input(INPUT_POST,"euro" );
$cantidadTotal = filter_input(INPUT_POST, "cantidadTotal");
$fecha = filter_input(INPUT_POST,"fecha" );
$idConciertoSala = filter_input(INPUT_POST,"idConciertoSala" );
$Usuario = filter_input(INPUT_POST,"Usuario" );

$fecha_actual=date("d/m/Y");
$hora=date("h:i:sa");

$objEntrada= new EntradaModel();


$objEntrada->comprar($fecha_actual,$hora,$idConciertoSala,$Usuario,$euro,$cantidadTotal,$fecha);

header("Location: ../index.php");







