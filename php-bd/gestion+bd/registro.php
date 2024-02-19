<?php
include "lib.php";
if (isset($_POST['NombreUsuario']) && isset($_POST['Contraseña1']) && isset($_POST['Contraseña2'])) {
    $NombreUsuario=$_POST["NombreUsuario"];
    $contraseña1=hash('sha512',$_POST['Contraseña1']);
    $contraseña2=hash('sha512',$_POST['Contraseña2']);
    if ($contraseña1 == $contraseña2) {
        // try para manejo de errores
        try {
            add_user($NombreUsuario,$contraseña1);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="registro.php" method="post">
        <input type="text" name="NombreUsuario" placeholder="Usuario"><br>
        <input type="text" name="Contraseña1" placeholder="Contraseña"><br>
        <input type="text" name="Contraseña2" placeholder="Repite Contraseña"><br>
        <input type="submit" value="Enviar">
    </form>
    <a href="login.php"><button>Iniciar sesión</button></a>
</body>
</html>