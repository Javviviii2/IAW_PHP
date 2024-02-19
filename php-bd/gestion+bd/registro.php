<?php
include "lib.php";
if (isset($_POST['NombreUsuario']) && isset($_POST['Contraseña1']) && isset($_POST['Contraseña2'])) {
    $NombreUsuario=$_POST["NombreUsuario"];
    $contraseña1=hash('sha512',$_POST['Contraseña1']);
    $contraseña2=hash('sha512',$_POST['Contraseña2']);
    if ($contraseña1 == $contraseña2) {
        // try para manejo de errores
        try {
            $host="db";
            $dbUsername="root";
            $dbPassword="test";
            $dbName="banco";
            //hacer conexión
            $dbconexion=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
            if ($dbconexion->connect_error) {
                die ;
            }
            // iniciar statement
            $statement=$dbconexion->stmt_init();
            // preparar statement
            $statement->prepare("Select * From usuarios Where usuario=?");
            $statement->bind_param('s',$NombreUsuario);
            // ejecutar
            $statement->execute();
            //resultado
            $resultado=$statement->get_result();
            //ver si existe el usuario
            if ($resultado->num_rows > 0) {
                echo "error";
            } else{
                // si no existe lo guardo en BBDD. Agregar datos a la BBDD
                $insertstatement=$dbconexion->stmt_init();
                $insertstatement->prepare('Insert Into usuarios(usuario,password) values (?,?)');
                $insertstatement->bind_param('ss', $NombreUsuario, $contraseña1);
                //ejecutar
                $insertstatement->execute();
                // cerrar
                $insertstatement->close();
            }
            $statement->close();
            $dbconexion->close();
    
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
    <a href="login.php">Inicia sesión</a>
</body>
</html>