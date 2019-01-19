<?php
   $idGrupo = filter_input(INPUT_POST, "idGrupo");
   

   //include_once  'controladorDescripcionCompleta.php?sp_id='.$idGrupo;
   
   $respuesta = si;
     header("Location: controladorDescripcionCompleta.php?sp_id=".$idGrupo);
   
?>


