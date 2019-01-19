<?php
include_once("connect_data.php");
  class EntradaModel extends EntradaClass{
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
    
           public function comprar($fecha_actual,$hora,$idConciertoSala,$Usuario,$euro,$cantidadTotal,$fecha) { 

           

        $this->OpenConnect();  
       
         
         $sql = "CALL comprar('". $fecha_actual ."', '". $hora ."','".$idConciertoSala."','".$Usuario."', '".$euro."', '".$cantidadTotal."','".$fecha."')"; 
         
         var_dump($sql);
        

        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
          public function verEntradas($usuario) { 

           

        $this->OpenConnect();  
      $sql = "CALL buscarEntrada('" . $usuario . "')"; 
        
         
         $this->list = array(); 
  
        $result = $this->link->query($sql); 
       
         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $Entrada = new EntradaClass();
         
           
            $Entrada->setIdEntrada($row['idEntrada']);
            $Entrada->setFechaCompra($row['fechaCompra']);
            $Entrada->setHoraCompra($row['horaCompra']);
            $Entrada->setUsername($row['usuario']);
            $Entrada->setPrecio($row['precio']);
            $Entrada->setCantidad($row['cantidad']);
            $Entrada->setFechaEvento($row['fechaEvento']);
            $Entrada->setHoraEvento($row['horaEvento']);
            $Entrada->setNombreConcierto($row['nombreConcierto']);
            $Entrada->setNombreSala($row['nombreSala']);
            $Entrada->setNombreGrupo($row['nombreGrupo']);
        
           
             
             
           
            
             array_push($this->list, $Entrada);
            
              
            
            
        }

        
      
        $this->link->query($sql);

        $this->CloseConnect();
    }
    
    
    

    public function CloseConnect() {
        mysqli_close($this->link);
    }
    
    
    }