<?php
include_once("connect_data.php");
  class GrupoModel extends GrupoClass{
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
    
    
    
    public function verGrupos() { 

           

        $this->OpenConnect();  
         $sql = "SELECT * FROM GRUPO"; 

        
         
         $this->list = array(); 
  
        $result = $this->link->query($sql); 
       
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $Grupo = new GrupoClass;
           
            $Grupo->setNombreGrupo($row['NombreGrupo']);
            $Grupo->setImagenGrupo($row['imagenGrupo']);
            $Grupo->setDescripcion($row['descripcion']);
            $Grupo->setIdGrupo($row['idGrupo']);
            $Grupo->setVideo($row['video']);
            $Grupo->setMiembros($row['miembros']);
            $Grupo->setDiscos($row['discos']);
            $Grupo->setDescripcionCompleta($row['descripcionCompleta']);
            $Grupo->setAñoFormacion($row['genero']);
            $Grupo->setGenero($row['genero']);
            
            
            
           
             
             
           
            
             array_push($this->list, $Grupo);
            
              
            
            
        }

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
       public function BorrarGrupo($idGrupo) { 

           

        $this->OpenConnect();  
      $sql = "CALL borrarGrupo('" . $idGrupo . "')"; 
        
         
         $this->list = array(); 
  
  
       
    

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
     
    
        public function verInformacionGrupos($idGrupo) { 

           

        $this->OpenConnect();  
      $sql = "CALL informacionCompletaGrupo('" . $idGrupo . "')"; 
        
         
         $this->list = array(); 
  
        $result = $this->link->query($sql); 
       
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $Grupo = new GrupoClass;
         
           
            $Grupo->setNombreGrupo($row['NombreConcierto']);
            $Grupo->setImagenGrupo($row['ImagenGrupo']);
            $Grupo->setDescripcion($row['NombreSala']);
            $Grupo->setIdGrupo($row['ConciertoSalaFecha']);
            $Grupo->setIdConciertoSala($row['idConciertoSala']);
            
           
             
             
           
            
             array_push($this->list, $Grupo);
            
              
            
            
        }

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
            public function verGrupoId($sp_id) { 

           

        $this->OpenConnect();  
      $sql = "CALL verGrupoId('" . $sp_id . "')"; 
        
         
         $this->list = array(); 
  
       
          $result = $this->link->query($sql); 
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            
         
             $Grupo = new GrupoClass;
         
           
          $Grupo->setNombreGrupo($row['NombreGrupo']);
            $Grupo->setImagenGrupo($row['imagenGrupo']);
            $Grupo->setDescripcion($row['descripcion']);
            $Grupo->setIdGrupo($row['idGrupo']);
            $Grupo->setVideo($row['video']);
            $Grupo->setMiembros($row['miembros']);
            $Grupo->setDiscos($row['discos']);
            $Grupo->setDescripcionCompleta($row['descripcionCompleta']);
            $Grupo->setAñoFormacion($row['añoFormacion']);
            $Grupo->setGenero($row['genero']);
            
           
             
             
           
            
             array_push($this->list, $Grupo);
            
              
            
            
        }

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
    
     
    
    

    public function CloseConnect() {
        mysqli_close($this->link);
    }
    
    
    }