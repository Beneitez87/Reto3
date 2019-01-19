<?php


$codigo = filter_input(INPUT_POST, "codigo");
$codigo2 = filter_input(INPUT_POST, "codigo2");
$Username = filter_input(INPUT_POST, "Username");



if ($codigo ===$codigo2){
    
    include '../vistas/CodigoView.php';
    
   ?> 
 <div class="pepe">
    <div class="form-group">
    <form  action="../controladores/controladorRestablecerContra.php" method="POST">
      <label for="Contraseña">Introduce nueva contraseña:</label>
      <input type="password" class="form-control" id="Contraseña" placeholder="Introduce nueva contraseña" name="pass1" required>
        <label for="Contraseña">Repite la contraseña:</label>
          <input type="password" class="form-control" id="Contraseña2" placeholder="Repite la contraseña" name="pass2" required>
            <button  type="submit" class="form-control">Restablecer contraseña</button> 
            <input type="hidden" class="form-control" placeholder="Username" name="Username" value="<?php echo $Username ?>"  required>
    </form>
    </div>
     <input type="text" class="form-control"  value="Codigo Correcto" name="pass2"  style="width: 15%;  background-color: greenyellow;" readonly required>
    </div>
    

     
    <?php
    
}else{
      include '../vistas/CodigoView.php';
 ?>
<input type="text" class="form-control"  value="Codigo Incorrecto" name="pass2"  style="width: 15%;  background-color: red;" readonly required>
     <?php 
}

?>