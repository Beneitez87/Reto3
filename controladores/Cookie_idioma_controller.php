<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    //creamos una cookie con nombre idioma_seleccionado, cuyo valor le pasamos por la url (ergo get), y con mucha duracion (un mes mas o menos)
    setcookie("idioma_seleccionado", $_GET["idioma"], time() + 86000,"/");
    //tras esto redirigimos a l apagina ver_cookie.php
    header("Location:../index.php");
    //como despues hemos hecho que la web pag1.php ya mire si esta o no creada la cookie y de estarlo que nos rediriga a la cada una 
    //de las paginas ya no haría falta que redirigiera a la pagina ver_cookies y luego esta a cada una de ellas o a la de elegir bandera
    //dado que eso ya lo hace pag1.php. ergo se podría haber puesto aqui directamente el header a pag1.php con el mismo resultado
    ?>
</body>
</html>