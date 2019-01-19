<?php
include_once("connect_data.php");
  class ConciertoSalaModel extends ConciertoSalaClass{
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
    
     
    
    

    public function CloseConnect() {
        mysqli_close($this->link);
    }
    
    
    }