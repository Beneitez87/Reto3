<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/estiloConFondoPrincipio.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    //es decir, si esta creada la cookie idioma_seleccionado entra. si esta es es ve a la pag español y si es en a la inglesa
    if (isset($_COOKIE["idioma_seleccionado"])) {

        if ($_COOKIE["idioma_seleccionado"] == "es") {
            header("location:../indexSpanish.php");
        } else if ($_COOKIE["idioma_seleccionado"] == "en") {
            header("location:../indexEnglish.php");
        }
    }
    ?>
    <table width="25%"" border="0" align="center">
        <tr>
            <td colspan="2" align="center"><h1>ELIGE IDIOMA/SELECT LANGUAGE</h1></td>
        </tr>
        <tr>
            <!--creamos un vinculo que manda a una u otra pagina y que le pasa un valor por get es español en english-->
            <td align="center"><a href="http:../controladores/Cookie_idioma_controller.php?idioma=es"><img src="../IMG/España.png" width="90" height="60" alt=""></a></td>
            <td align="center"><a href="http:../controladores/Cookie_idioma_controller.php?idioma=en"><img src="../IMG/UK.jpg" width="90" height="60" alt=""></a></td>
            

        </tr>
    
    </table>

</body>
</html>