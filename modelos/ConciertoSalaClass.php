<?php

class ConciertoSalaClass
{
    protected $idConciertoSala;
    protected $fecha;
    protected $idSala;
    protected $idConcierto;
    
    function getIdConciertoSala() {
        return $this->idConciertoSala;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdSala() {
        return $this->idSala;
    }

    function getIdConcierto() {
        return $this->idConcierto;
    }

    function setIdConciertoSala($idConciertoSala) {
        $this->idConciertoSala = $idConciertoSala;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdSala($idSala) {
        $this->idSala = $idSala;
    }

    function setIdConcierto($idConcierto) {
        $this->idConcierto = $idConcierto;
    }


    
}