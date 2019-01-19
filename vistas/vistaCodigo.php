<?php

?>



 
            <div  id="codigo"class="registro">
                <form  action="../controladores/controladorPrueba.php" method="POST">
                    <input id="codigo" type="text" class="form-control"  placeholder="Introduce el codigo de verificacion" name="codigo" required>
                    <input id="codigo2" type="hidden" class="form-control"  placeholder="Introduce el codigo de verificacion" name="codigo2" value="<?php echo $CorreoRecibido ?>" required>
                    <button  id="Registrar" type="submit" class="btn btn-default">Enviar Codigo</button>
                </form>
    </div>
    


