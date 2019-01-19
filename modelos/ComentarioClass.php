<?php

class ComentarioClass
{
    
    protected $idComentario;
    protected $idConcierto;
    protected $username;
    protected $comentario;
    protected $fechaComentario;
    protected $horaComentario;
    
    
    
    function getFechaComentario() {
        return $this->fechaComentario;
    }

    function getHoraComentario() {
        return $this->horaComentario;
    }

    function setFechaComentario($fechaComentario) {
        $this->fechaComentario = $fechaComentario;
    }

    function setHoraComentario($horaComentario) {
        $this->horaComentario = $horaComentario;
    }

        
    function getIdComentario() {
        return $this->idComentario;
    }

    function getIdConcierto() {
        return $this->idConcierto;
    }

    function getUsername() {
        return $this->username;
    }

    function getComentario() {
        return $this->comentario;
    }

    function setIdComentario($idComentario) {
        $this->idComentario = $idComentario;
    }

    function setIdConcierto($idConcierto) {
        $this->idConcierto = $idConcierto;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }


    
}