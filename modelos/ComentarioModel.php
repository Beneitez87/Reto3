<?php
include_once("connect_data.php");
class ComentarioModel extends ComentarioClass{
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
    
    
        public function insertarComentario($idGrupo,$usuarioComentario,$mensaje,$fecha_actual,$hora) { 

           

        $this->OpenConnect();  
               $sql = "CALL insertarComentario('".$idGrupo."','".$usuarioComentario."','".$mensaje."','".$fecha_actual."','".$hora."')"; 

        

        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
      public function verComentarios($sp_id) { 

           

        $this->OpenConnect();  
     $sql = "CALL verComentarios('".$sp_id."')"; 

        
         
         $this->list = array(); 
  
        $result = $this->link->query($sql); 
       
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $Comentario = new ComentarioClass;
           
            $Comentario->setIdConcierto($row['idConcierto']);
            $Comentario->setIdComentario($row['idComentario']);
            $Comentario->setUsername($row['username']);
            $Comentario->setComentario($row['comentario']);
            $Comentario->setFechaComentario($row['fechaComentario']);
            $Comentario->setHoraComentario($row['horaComentario']);
            
            
            
            
           
             
             
           
            
             array_push($this->list, $Comentario);
            
              
            
            
        }

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
     public function respuesta() { 

           

        $this->OpenConnect();  
     $sql = "SELECT * FROM `comentario` ORDER BY `comentario`.`idComentario` DESC LIMIT 1"; 

        
         
         $this->list = array(); 
  
        $result = $this->link->query($sql); 
       
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $respuesta = new ComentarioClass;
           
            $respuesta->setIdConcierto($row['idConcierto']);
            $respuesta->setIdComentario($row['idComentario']);
            $respuesta->setUsername($row['username']);
           $respuesta->setComentario($row['comentario']);
            $respuesta->setFechaComentario($row['fechaComentario']);
            $respuesta->setHoraComentario($row['horaComentario']);
            
            
            
            
           
             
             
           
            
             array_push($this->list, $respuesta);
            
              
            
            
        }

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
     
    
    

    public function CloseConnect() {
        mysqli_close($this->link);
    }
    
    
    }