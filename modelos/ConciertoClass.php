<?php

class UsuarioClass
{


    protected $idConcierto;
    protected $nombreConcierto;
    protected $idGrupo;
    
    
    
    function getIdConcierto() {
        return $this->idConcierto;
    }

    function getNombreConcierto() {
        return $this->nombreConcierto;
    }

    function getIdGrupo() {
        return $this->idGrupo;
    }

    function setIdConcierto($idConcierto) {
        $this->idConcierto = $idConcierto;
    }

    function setNombreConcierto($nombreConcierto) {
        $this->nombreConcierto = $nombreConcierto;
    }

    function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }


}