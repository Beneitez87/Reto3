<?php
include_once("connect_data.php");
  class UsuarioModel extends UsuarioClass{
    private $link;  
    private $list;  
    
   

    function getList() {
        return $this->list;
    }
    
    

    public function OpenConnect() {
        $konDat = new connect_data();
        try {
            $this->link = new mysqli($konDat->host, $konDat->userbbdd, $konDat->passbbdd, $konDat->ddbbname);
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); 
        //                  
    }
    
     
     public function registro($Usuario,$passwordEncripted,$Nombre,$Apellido1,$Apellido2,$Fecha,$Direccion,$Correo,$Privilegios) { 

           

        $this->OpenConnect();  
         $sql = "CALL registro('" . $Usuario . "', '". $passwordEncripted ."','".$Nombre."', '".$Apellido1."', '".$Apellido2."', '".$Fecha."','".$Direccion."','".$Correo."','".$Privilegios."')"; 

        

        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
      public function restablecer($passwordEncripted,$Username) { 

           

        $this->OpenConnect();  
         $sql = "CALL restablecerContra('" . $passwordEncripted . "', '". $Username ."')"; 

        

        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
         public function Login($Usuario) { 

           

        $this->OpenConnect();  
         $sql = "CALL login('" . $Usuario . "')"; 

        
         
         $this->list = array(); 
  
        $result = $this->link->query($sql); 
       
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $login = new UsuarioClass;
             
            $login->setUsername($row['username']);
            $login->setNombre($row['nombre']);      
            $login->setPass($row['pass']);
            $login->setApellido1($row['apellido1']);
            $login->setApellido2($row['apellido2']);
            $login->setFechaNacimiento($row['fechaNacimiento']);
            $login->setDireccion($row['direccion']);
            $login->setCorreo($row['correo']);
            $login->setPrivilegios($row['privilegios']);
            
           
             
             
           
            
             array_push($this->list, $login);
         
              
            
            
        }

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
    
       public function BuscarCorreo($correo) { 

           

        $this->OpenConnect();  
         $sql = "CALL contraOlvidada('" . $correo . "')"; 

       
         
         $this->list = array(); 
  
        $result = $this->link->query($sql); 
       
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $email = new UsuarioClass;
           
           $email->setUsername($row['username']);  
           $email->setPass($row['pass']);
           
             
             
           
            
             array_push($this->list, $email);
         
              
          
            
        }

      
     
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
    public function editarPerfil($nombre,$apellido1,$apellido2,$fecha,$direccion,$correo,$Usuario){
        
                $this->OpenConnect();  
         $sql = "CALL editarPerfil('" . $nombre ."', '". $apellido1."', '".$apellido2."', '".$fecha ."', '".$direccion."', '". $correo. "', '".$Usuario . "')"; 

        
         
         $this->list = array(); 

       
    

      
     
        $this->link->query($sql);

        $this->CloseConnect();
        
        
    }


    

    public function CloseConnect() {
        mysqli_close($this->link);
    }
    
    
    }