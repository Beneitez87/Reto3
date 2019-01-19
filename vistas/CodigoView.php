
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/confirmacion.css">
    <script src="../JS/codigoJS.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container contact-form">
<div class="contact-image">
    <img src="../IMG/Logo.png"/>
</div>
    
  <form  action="../controladores/controladorPrueba.php" method="POST">
    <h4>Hemos enviado un codigo a tu correo electronico </h4>      
    <h3>Introduce el codigo:</h3>
   
   <div class="row">
        <div class="col-md-2">
            <div class="form-group">
               <label>Codigo:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                   <input id="codigo" type="text" class="form-control"  placeholder="Introduce el codigo de verificacion" name="codigo" required>
                   <input id="codigo2" type="hidden" class="form-control"  placeholder="Introduce el codigo de verificacion" name="codigo2" value="<?php echo $CorreoRecibido ?>" required>
                   <input id="Username" type="hidden" class="form-control"  placeholder="Username" name="Username" value="<?php echo $Username ?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <button id="cod" type="submit" class="form-control">Enviar Codigo</button>  
                   
            </div>
        </div>
    </div>
</form>
</div>
</body>
</html>
