<?php
        //lo de siempre para destruirla es igual que crearla pero con tiempo negativo
setcookie("idioma_seleccionado", "en", time() - 1, "/");
setcookie("idioma_seleccionado", "es", time() -1, "/");

header("location: ../vistas/EleccionIdioma.php");

?>