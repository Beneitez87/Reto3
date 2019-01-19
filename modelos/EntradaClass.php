<?php

class EntradaClass
{
    
    
    protected $idEntrada;
    protected $fechaCompra;
    protected $horaCompra;
    protected $idConciertoSala;
    protected $username;
    protected $precio;
    protected $cantidad;
    protected $fechaEvento;
    protected $horaEvento;
    protected $nombreConcierto;
    protected $nombreSala;
    protected $nombreGrupo;
            
    function getHoraEvento() {
        return $this->horaEvento;
    }

    function setHoraEvento($horaEvento) {
        $this->horaEvento = $horaEvento;
    }

        function getNombreConcierto() {
        return $this->nombreConcierto;
    }

    function getNombreSala() {
        return $this->nombreSala;
    }

    function getNombreGrupo() {
        return $this->nombreGrupo;
    }

    function setNombreConcierto($nombreConcierto) {
        $this->nombreConcierto = $nombreConcierto;
    }

    function setNombreSala($nombreSala) {
        $this->nombreSala = $nombreSala;
    }

    function setNombreGrupo($nombreGrupo) {
        $this->nombreGrupo = $nombreGrupo;
    }

        function getHoraCompra() {
        return $this->horaCompra;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getFechaEvento() {
        return $this->fechaEvento;
    }

    function setHoraCompra($horaCompra) {
        $this->horaCompra = $horaCompra;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setFechaEvento($fechaEvento) {
        $this->fechaEvento = $fechaEvento;
    }

        function getIdEntrada() {
        return $this->idEntrada;
    }

    function getFechaCompra() {
        return $this->fechaCompra;
    }

    function getIdConciertoSala() {
        return $this->idConciertoSala;
    }

    function getUsername() {
        return $this->username;
    }

    function setIdEntrada($idEntrada) {
        $this->idEntrada = $idEntrada;
    }

    function setFechaCompra($fechaCompra) {
        $this->fechaCompra = $fechaCompra;
    }

    function setIdConciertoSala($idConciertoSala) {
        $this->idConciertoSala = $idConciertoSala;
    }

    function setUsername($username) {
        $this->username = $username;
    }


    
    
    
}