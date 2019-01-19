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
    <!--esta pagina detecta que idioma le pasamos, que bandera hemos pulsado-->

    <?php
    //es decir si la cookie idioma_seleccionado no existe me devuelves a la pagina banderas, si esta creada y es es me llevas a la 
    //pagina en español y si es en a la página en ingles a traves de header
    if (!$_COOKIE["idioma_seleccionado"]) {
        header("location:vistas/EleccionIdioma.php");
    } else if ($_COOKIE["idioma_seleccionado"] == "es") {
        header("location:indexSpanish.php");
    } else if ($_COOKIE["idioma_seleccionado"] == "en") {
        header("location:indexEnglish.php");
    }
    ?>
</body>
</html>