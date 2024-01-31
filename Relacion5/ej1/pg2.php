<?php 
session_start();
if (isset($_POST['nombre'])) {
    $nombre=$_POST['nombre'];
    if (empty($nombre)) {
        echo "No se ha introducido ningún nombre.";
    } else {
        $_SESSION['nombre']=$nombre;
        echo "el nombre escrito es: $nombre";
    }
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <br><a href='pg1.php'>Volver</a>
    </body>
</html>