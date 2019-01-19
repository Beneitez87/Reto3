<?php

class SalaClass
{
    
    
    protected $idSala;
    protected $NombreSala;
    protected $aforo;
   
    function getIdSala() {
        return $this->idSala;
    }

    function getNombreSala() {
        return $this->NombreSala;
    }

    function getAforo() {
        return $this->aforo;
    }

    function setIdSala($idSala) {
        $this->idSala = $idSala;
    }

    function setNombreSala($NombreSala) {
        $this->NombreSala = $NombreSala;
    }

    function setAforo($aforo) {
        $this->aforo = $aforo;
    }


    
    
}

