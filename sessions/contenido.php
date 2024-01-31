<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
        if (isset($_SESSION["username"])) {
            echo "Area privada con el usuario: ". $_SESSION["username"];
            
        } else {
            header("Location: login.php");
        }
        ?>
        <br><a href="cerrarsesion.php"> Cerrar sesión </a>
    </body>
</html>
<?
//aquí tendremos que iniciar sesión y comprobar que hay un username almacenado en la sesión
//si lo hay podemos mostrar el contenido privado
//en caso contracio usaremos la función header("Location: login.php"); para redirigir al usuario
//al login


?>
