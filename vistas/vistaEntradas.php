   <?php
session_start();
   
include_once '../modelos/EntradaClass.php';
include_once '../modelos/EntradaModel.php';
$objEntradas= new EntradaModel();
$usuario = $_SESSION['usuario'];
$objEntradas->verEntradas($usuario);
$listaEntradas = $objEntradas->getList();   

                  ?>
<html ng-app="MyApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive Sticky Navbar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script type="text/javascript" src="../JS/snowstorm.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../lib/angular.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="../style/style.css">
    <script src="../JS/jquery-3.3.1.js"></script>
    <script src="../js.js"></script>
    <script src="../JS/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <script>window.addEventListener("load", function () {
      
    var flechaWork = document.getElementById('flecha_work');
    var work = document.getElementById("work2");
    
    work.style.opacity = "0";
    flechaWork.addEventListener("click", function () {
        if (work.style.left === "51.1%") {
            
           
            work.style.left = "37.4%";
             work.style.opacity="0";
            work.style.transition = "all 0.5s";
        } else {
            work.style.left = "51.1%";
             work.style.opacity="1";
            work.style.transition = "all 0.5s";
        }
    });
});  </script>
</head>

<body ng-controller="miControlador">
    <div class="wrapper">
        <header>
            <nav>
                <div class="menu-icon">
                    <i class="fa fa-bars fa-2x"></i>
                </div>
                <div class="logo">
                    <img src="../IMG/Logo.png" style="position: static; width: 100px"> 
                </div>
                <div class="menu">
                    <ul>
                        <li><a id="nav" href="../index.php" >Inicio</a></li>
                        <li><a id="nav" href="#">Entradas</a></li>
                        
                         <?php  
                        
                           if(empty($_SESSION['usuario'])){
                            
                            ?>
                            
                            
                        <li><a id="nav" href="#" ng-click="login()" >Identificate</a></li>
                        
                        
                         <?php     
                      }
                         ?>
                        
                        <?php
                        
                        if(isset($_SESSION['usuario'])){
                            
                            ?>
                            
                      
                     
                         <h4><b>Bienvenido: <?php echo $_SESSION['usuario']?> (<?php echo $_SESSION['privilegios']?>)   </b></h4> 
                         
                          <button class="button2"><a href="../controladores/controladorSalirLogin.php" name="CerrarSesion"><p class="p2">Cerrar sesión</p></a></button>
                        <button class="button2"><a  id="linkPerfil" name="miPerfil"><p class="p2">Mi Perfil</p></a></button>
                         
                         
                      
                        
                      <?php     
                      }
                         ?>
                         
                    </ul>
                </div>

            </nav>
            
            
        
            <div class="login" style="z-index: 80" ng-show="verFormulario === 'si'" ng-style="style">
                
                <div ng-show="formulario ==='si'" >
                    <button  class="fas fa-times-circle" type="button" ng-click="cancelar()" style="margin-left: 180px; border: none; padding: 0; background: none;" ></button>
                    <form action="controladores/controladorLogin.php" method="POST"> 
 <div class="form-group">
      <label for="email">Nombre:</label>
      <input type="text" class="form-control" id="nombre" <?php if((filter_input(INPUT_COOKIE, 'cook_user'))!=NULL){ echo 'style="background-color: yellow;';} ?> placeholder="Introduce Usuario" name="nombre" <?php if((filter_input(INPUT_COOKIE, 'cook_user'))!=NULL)
      {
      echo 'value='.filter_input(INPUT_COOKIE, 'cook_user');         
      }
      ?> required>
      
    </div>
                              

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Introduce Contraseña" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="recordar"> Recuerdame</label>
    </div>
    <button id="Login" type="submit" class="btn btn-default">Entrar</button>
    <button type="button" ng-click="registro()" class="btn btn-default">Registrarme</button> <br> <BR>
    <label><a href="#" ng-click="contrasenaOlvidada()"> He olvidado la contraseña</a> </label>
        </form>               
    </div>
   
                
            
                
                <div ng-show="olvidada ==='si'">
                    <form action="controladores/Sendingemail_Controller.php" method="POST"> 
                        <label>Introduce Correo<input type="text" name="recuperarContraseña"></label>
    <button id="olvidada" type="submit" class="btn btn-default">Enviar</button>
    <button type="button" ng-click="cancelar()" class="btn btn-default">Cancelar</button><br><br>
                    </form>
    </div>
    

                
    </div>
            <div class="registro" ng-show="verRegistro === 'si'" >
             
                <form action=controladores/controladorRegistro.php method="POST">
    <div class="form-group">
            <button  class="fas fa-times-circle" type="button" ng-click="cancelar()" style="margin-left: 180px; background: none; border:none;" ></button>
            <button  class="fas fa-arrow-alt-circle-left" type="button" ng-click="login()" style="margin-left: 145px; margin-top: -15.5px; background: none; border:none;" ></button>
      <label for="Usuario">Usuario:</label>
      <input type="text" class="form-control" id="Usuario" placeholder="Introduce Usuario" name="Usuario">
    </div>
    <div class="form-group">
      <label for="Contraseña">Contraseña:</label>
      <input type="password" class="form-control" id="Contraseña" placeholder="Introduce Contraseña" name="pwd">
    </div>
    <div class="form-group">
      <label for="Nombre">Nombre:</label>
      <input type="text" class="form-control" id="Nombre" placeholder="Introduce Nombre" name="Nombre">
    </div>
    <div class="form-group">
      <label for="Apellido1">Apellido1:</label>
      <input type="text" class="form-control" id="Apellido1" placeholder="Introduce Apellido1" name="Apellido1">
    </div>
    <div class="form-group">
      <label for="Apellido2">Apellido2:</label>
      <input type="text" class="form-control" id="Apellido2" placeholder="Introduce Apellido2" name="Apellido2">
    </div>
                    
                     <div class="form-group">
      <label for="Fecha">Fecha Nacimiento:</label>
      <input type="date" class="form-control" id="Fecha" placeholder="Introduce Fecha" name="Fecha">
    </div>
                     <div class="form-group">
      <label for="Direccion">Direccion:</label>
      <input type="text" class="form-control" id="Direccion" placeholder="Introduce Direccion" name="Direccion">
    </div>
                     <div class="form-group">
      <label for="Correo">Correo:</label>
      <input type="email" class="form-control" id="Correo" placeholder="Introduce Correo" name="Correo">
    </div>
    
    <button  id="Registrar" type="submit" class="btn btn-default">Registrarse</button>
    
  </form>
                
                
            </div>
           <div id="Perfil" ng-style="myStyle" style="width:200px; margin-left: 45%; position: relative; top: 100px; z-index: 90;  ">
            <img src="IMG/anonimo.jpg"  alt="Avatar" style=" width:190px; height:200px; ">

  
  
          
   
    <h4><b>Perfil: <?php echo $_SESSION['usuario']  ?></b></h4> 
  <p>Nombre:  <?php echo $_SESSION['nombre']  ?> </p>
  <p> Primer Apellido: <?php echo $_SESSION['apellido1']  ?> </p>
  <p> Segundo Apellido: <?php echo $_SESSION['apellido2']  ?> </p>
   <p> Fecha de nacimiento: <?php echo $_SESSION['fecha']  ?> </p>
    <p> Direccion: <?php echo $_SESSION['direccion']  ?> </p>
     <p> Correo: <?php echo $_SESSION['correo']  ?></p>
       <p> Privilegios: <?php echo $_SESSION['privilegios']  ?> </p>
       <p><button class="btn3" ng-click="cerrar()">Cerrar</button></p>
  <p><button class="btn3" id='flecha_work'>Editar mi perfil</button></p> 

</div>
            
            <div id="work2">
            <div id="Perfil2">
                <form action=controladores/controladorPerfil.php method="POST">
                <p>Nombre:  <input type="text" name="nombre"> </p>
                <p> Primer Apellido: <input type="text" name="apellido1"> </p>
                <p> Segundo Apellido: <input type="text" name="apellido2"> </p>
                <p> Fecha de nacimiento: <input type="date" name="fecha"> </p>
                <p> Direccion: <input type="text" name="direccion"> </p>
                <p> Correo: <input type="email" name="correo"></p>
                <p><button  id="guardar" class="btn3" type="submit">Guardar Configuracion</button></p>           
                 </form>
</div>
        </div>
            
        </header>
        
              
        <style>
        body{
            background-color: dimgray;
        }
        .entrada{
            background-color: white;
            width: 500px;
            height: 250px;
            display: flex;
        
        }
        .parte1{
            background-color: skyblue;
            width: 10%;
            height: auto;
             writing-mode: vertical-lr;
    transform: rotate(180deg);
           
          
            
            
        }
        
        .parte2{
            background-color: aliceblue;
            width: 60%;
            height: 90%;
            
        }
        
        .parte3{
            background-color: white;
            width:5%;
            height: auto;
              border-left: 4px dashed black;
     
           
            
    
        }
        
        .info1{
            background-color: white;
             width: 100%;
            height: 45%;
            display: flex;
           
          
        }
        
        .sala{
            background-color: yellow;
            width: 100%;
            height: 50%;
             margin-top: 30px;
            margin-right: 20px;
            margin-left: 20PX;
           
           
        }
        .lugar{
            display: flex;
            margin-top: 10%;
            font-family: sans-serif;
            justify-content: center;
           
            
        }
        
       
        
        .butaca{
            background-color: white;
             width: 50%;
           height: 50%;
            margin-top: 30px;
            margin-right: 20px;
        }
           .info2{
            background-color: black;
             width: 90%;
            height: 1%;
               margin-left: 15px;
              
              
             
         
          
        }
        .info3{
            background-color: white;
             width: 100%;
            height: 52%;
        }
        
        
    </style>
    </head>
    <body>
              <?php 
                
                foreach($listaEntradas as $objEntradas){
   
  
  
  
  
?>
        <div class="entrada">
        <div class="parte1">
            <div class="fecha" style="font-family: monospace; text-align: center;">FECHA COMPRA:<?php echo $objEntradas->getFechaCompra();?> </div>
            <div class="hora" style="font-family: monospace; text-align: center;">HORA COMPRA: <?php echo $objEntradas->getHoraCompra();?></div>     
            
            </div>
        <div class="parte2">
            <div class="hora" style="font-family: monospace; text-align: center;">Codigo: <?php echo $objEntradas->getIdEntrada();?> Nombre: <?php echo $objEntradas->getUsername();?></div>
            
            <div class="info1">
               
                <div class="sala">
                    <div class="lugar"><?php echo $objEntradas->getNombreSala();?></div>
                
                </div>
                <div class="butaca">
                    <div class="hora" style="font-family: monospace; text-align: center;">PRECIO: <?php echo $objEntradas->getPrecio();?></div>
                    <div class="hora" style="font-family: monospace; text-align: center;">CANTIDAD:x<?php echo $objEntradas->getCantidad();?></div>
                    
                </div>
                  
            </div>
            <div class="info2">
            </div>
            <div class="info3">
                <div style="display: flex; justify-content: center; font-family: monospace; font-weight: bold; marg">PRESENTA</div><BR></BR>
                <div style="display: flex; justify-content: center; font-family: fantasy; font-size: 20PX; font-weight: bold; margin-bottom: 15px; margin-top: -20PX;"><?php echo $objEntradas->getNombreGrupo();?></div> 
                <span class="fechas" style="display: flex; justify-content: flex-start; font-family: monospace; font-weight: bold;"> Hora: <?php echo $objEntradas->getHoraEvento();?>   fecha: <?php echo $objEntradas->getFechaEvento();?>  </span>

             
                
            </div>
                
            </div>
        <div class="parte3"></div>
        <img src="../entradas/barcode.gif">
        </div>
        <br>
        <br>
        <br>
                  <?php 
                
                }
   
  
  
  
  
?>
        
    </body>
                   
           
    
</body>

</html>
