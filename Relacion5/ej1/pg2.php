<?php 
session_start();
$nombre=$_SESSION['nombre'];
if (empty($nombre)) {
    echo "No se ha introducido ningún nombre.";
} else {
    echo "el nombre escrito es: $nombre";
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <br><a href='pg1.php'>Volver</a>
    </body>
</html>