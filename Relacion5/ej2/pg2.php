<?php 
session_start();
$edad=$_SESSION['edad'];
if (isset($edad) and is_numeric($edad)){
    if ($edad>18 and $edad<130) {
        echo $edad;
    } else {
    $aviso="Error";
    header("Location: pg1.php".$aviso);
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