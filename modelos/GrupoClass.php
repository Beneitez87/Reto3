<?php

class GrupoClass
{
    
    protected $idGrupo;
    protected $NombreGrupo;
    protected $imagenGrupo;
    protected $descripcion;
    protected $idConciertoSala;
    protected $video;
    protected $miembros;
    protected $discos;
    protected $descripcionCompleta;
    protected $añoFormacion;
    protected $genero;
    
    function getMiembros() {
        return $this->miembros;
    }

    function getDiscos() {
        return $this->discos;
    }

    function getDescripcionCompleta() {
        return $this->descripcionCompleta;
    }

    function getAñoFormacion() {
        return $this->añoFormacion;
    }

    function getGenero() {
        return $this->genero;
    }

    function setMiembros($miembros) {
        $this->miembros = $miembros;
    }

    function setDiscos($discos) {
        $this->discos = $discos;
    }

    function setDescripcionCompleta($descripcionCompleta) {
        $this->descripcionCompleta = $descripcionCompleta;
    }

    function setAñoFormacion($añoFormacion) {
        $this->añoFormacion = $añoFormacion;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

                
    function getVideo() {
        return $this->video;
    }

    function setVideo($video) {
        $this->video = $video;
    }

                
    
    
    function getIdConciertoSala() {
        return $this->idConciertoSala;
    }

    function setIdConciertoSala($idConciertoSala) {
        $this->idConciertoSala = $idConciertoSala;
    }

    

                    
    function getIdGrupo() {
        return $this->idGrupo;
    }

    function getNombreGrupo() {
        return $this->NombreGrupo;
    }

    function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    function setNombreGrupo($NombreGrupo) {
        $this->NombreGrupo = $NombreGrupo;
    }

    function getImagenGrupo() {
        return $this->imagenGrupo;
    }

    function setImagenGrupo($imagenGrupo) {
        $this->imagenGrupo = $imagenGrupo;
    }

      function getDescripcion() {
        return $this->descripcion;
    }

        function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    
    
}