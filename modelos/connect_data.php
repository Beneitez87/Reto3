<?php
try{
    $link=new mysqli('localhost', 'root', '', 'proyectoconciertos');
    
}
catch(Exception $e)
{
    echo $e->getMessage();
}

class connect_data
{
     public $host='localhost';
    public $userbbdd='root';
    public $passbbdd='';
    public $ddbbname='proyectoconciertos';
}
