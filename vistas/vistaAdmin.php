  <?php  
                        
                          session_start();
                            
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
    <link rel="stylesheet" href="../style/estiloAdmin.css">
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
});  
    
    </script>
    
    
    <style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: gray;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: grey;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
</head>

<body ng-controller="miControlador">
    <div class="wrapper">
        <header>
            <nav>
                <div class="menu-icon">
                    <i class="fa fa-bars fa-2x"></i>
                </div>
<!--                <div class="logo">
                    <img src="../IMG/Logo.png" style="position: static; width: 100px"> 
                </div>-->
                <div class="menu">
                    <ul>
                      
                       
                        
                        
                             
                        <li><a id="nav" href="#" class="nav-anadir" >Añadir</a></li>
                        <li><a id="nav" href="#" >Borrar</a></li>
                        <li><a id="nav" href="#" class="nav-modificar" >Modificar</a></li>
                         <li><a id="nav" href="#" >Buscar</a></li>
                      
                     
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
              
                         <button class="button2"><a href="../index.php" name="volver"><p class="p2"><img src="../IMG/admin/240_F_230948348_ZlsXcvPBhr8icADRyFgLm5mPXPAULNfk.jpg" style="width: 60px; height: 52px; "></p></a></button>
                               
                     
                         
                         
                      
                        
                      <?php     
                      }
                         ?>
                         
                    </ul>
                </div>

            </nav>
            
            
            
        
            <div class="login" style="z-index: 80" ng-show="verFormulario === 'si'" ng-style="style">
                
                <div ng-show="formulario ==='si'" >
                    <button  class="fas fa-times-circle" type="button" ng-click="cancelar()" style="margin-left: 180px; border: none; padding: 0; background: none;" ></button>
                    <form action="../controladores/controladorLoginAdmin.php" method="POST"> 
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
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: gray;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>



    
    
<form action="#">
    <div id="ModificarGrupo" class="container">
    <h1>Modificar Grupo</h1>
    <p>Porfavor rellena todos los datos</p>
    <hr>

  
 <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
<div class="custom-select" style="width:190px; height:45px; margin-left:80%  ">
  <select>
    <option value="0">Selecciona id:</option>
    <option value="1">1</option>
    <option value="1">2</option>
    <option value="1">3</option>
   
  </select>
</div>

    <label for="NombreGrupo"><b>Nombre de Grupo</b></label>
    <input type="text" placeholder="Introduce Nombre de Grupo" name="NombreGrupo" required>

    <label for="ImagenGrupo"><b>Imagen de Grupo</b></label>
    <input type="text" placeholder="Introduce Imagen de Grupo" name="ImagenGrupo" required>
    
    <label for="Video"><b>Video</b></label>
    <input type="text" placeholder="Introduce Video" name="Video" required>
    <label for="AñoFormacion"><b>Año de Formacion</b></label>
    <input type="text" placeholder="Introduce Año de Formacion" name="AnoFormacion" required>
    
        <label for="Genero"><b>Genero</b></label>
    <input type="text" placeholder="Introduce Genero" name="Genero" required>
    
        
     <label for="Descripcion"><b>Descripcion</b></label>
     <p><textarea cols="50" rows="5" name="Descripcion" placeholder="Introduce Descripcion"></textarea></p>
   
    <label for="DescripcionCompleta"><b>Descripcion Completa</b></label>
  <p><textarea cols="50" rows="5" name="DescripcionCompleta" placeholder="Introduce DescripcionCompleta"></textarea></p>
     
  
  <label style="margin-left: 50%; margin-top: 2%; " for="Miembros"><b style=" position: absolute; margin-top:-19.5%">Miembros</b></label>
    <p style="margin-left: 50%; margin-top:-25%"><textarea cols="50" rows="5" name="Miembros" placeholder="Introduce Miembros"></textarea></p>
    
    
    <label style="margin-left: 50%" for="Discos"><b>Discos</b></label>
    <p style="margin-left: 50% "><textarea cols="50" rows="5" name="Discos" placeholder="Introduce Discos"></textarea></p>
    
    
    <hr>
    <p>Zornotza Ticket Company <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Modificar</button>
  </div>
</form>    
    
    
    
<form action="#">
    <div id="AnadirGrupo" class="container">
    <h1>Añadir Grupo</h1>
    <p>Porfavor rellena todos los datos</p>
    <hr>

  

    <label for="NombreGrupo"><b>Nombre de Grupo</b></label>
    <input type="text" placeholder="Introduce Nombre de Grupo" name="NombreGrupo" required>

    <label for="ImagenGrupo"><b>Imagen de Grupo</b></label>
    <input type="text" placeholder="Introduce Imagen de Grupo" name="ImagenGrupo" required>
    
    <label for="Video"><b>Video</b></label>
    <input type="text" placeholder="Introduce Video" name="Video" required>
    <label for="AñoFormacion"><b>Año de Formacion</b></label>
    <input type="text" placeholder="Introduce Año de Formacion" name="AnoFormacion" required>
    
        <label for="Genero"><b>Genero</b></label>
    <input type="text" placeholder="Introduce Genero" name="Genero" required>
    
        
     <label for="Descripcion"><b>Descripcion</b></label>
     <p><textarea cols="50" rows="5" name="Descripcion" placeholder="Introduce Descripcion"></textarea></p>
   
    <label for="DescripcionCompleta"><b>Descripcion Completa</b></label>
  <p><textarea cols="50" rows="5" name="DescripcionCompleta" placeholder="Introduce DescripcionCompleta"></textarea></p>
     
  
  <label style="margin-left: 50%; margin-top: 2%; " for="Miembros"><b style=" position: absolute; margin-top:-19.5%">Miembros</b></label>
    <p style="margin-left: 50%; margin-top:-25%"><textarea cols="50" rows="5" name="Miembros" placeholder="Introduce Miembros"></textarea></p>
    
    
    <label style="margin-left: 50%" for="Discos"><b>Discos</b></label>
    <p style="margin-left: 50% "><textarea cols="50" rows="5" name="Discos" placeholder="Introduce Discos"></textarea></p>
    
    
    <hr>
    <p>Zornotza Ticket Company <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Añadir</button>
  </div>
</form>
          
                   





<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
    
</body>

</html>
