<?php

class UsuarioClass
{
     protected $username;  
     protected $pass;
     protected $nombre;
     protected $apellido1;
     protected $apellido2;
     protected $fechaNacimiento;
     protected $direccion;
     protected $correo;
     protected $privilegios;
          
     function getUsername() {
         return $this->username;
     }

     function getPass() {
         return $this->pass;
     }

     function getNombre() {
         return $this->nombre;
     }

     function getApellido1() {
         return $this->apellido1;
     }

     function getApellido2() {
         return $this->apellido2;
     }

     function getFechaNacimiento() {
         return $this->fechaNacimiento;
     }

     function getDireccion() {
         return $this->direccion;
     }

     function getCorreo() {
         return $this->correo;
     }

     function getPrivilegios() {
         return $this->privilegios;
     }

     function setUsername($username) {
         $this->username = $username;
     }

     function setPass($pass) {
         $this->pass = $pass;
     }

     function setNombre($nombre) {
         $this->nombre = $nombre;
     }

     function setApellido1($apellido1) {
         $this->apellido1 = $apellido1;
     }

     function setApellido2($apellido2) {
         $this->apellido2 = $apellido2;
     }

     function setFechaNacimiento($fechaNacimiento) {
         $this->fechaNacimiento = $fechaNacimiento;
     }

     function setDireccion($direccion) {
         $this->direccion = $direccion;
     }

     function setCorreo($correo) {
         $this->correo = $correo;
     }

     function setPrivilegios($privilegios) {
         $this->privilegios = $privilegios;
     }

      
    
    
    
    
}