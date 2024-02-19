<?
session_start(); 
include "lib.php";

if(isset($_POST['usuario']) && isset($_POST['password'])){
    $username=strtolower($_POST['usuario']);
    $password=hash('sha512',$_POST['password']);
    try {
        //hacer conexión base de datos
        $dbconexion=conectarDB();
        // iniciar statement obtener datos BBDD
        $statement=$dbconexion->stmt_init();
        // preparar statement
        $statement->prepare('Select * From usuarios Where usuario = ? and password = ?');
        $statement->bind_param('ss',$username,$password );
        $statement->execute();
        //resultado
        $resultado=$statement->get_result();
        //ver si existe el usuario
        if ($resultado->num_rows == 1) {
            // guardar usuario en la sessión para que pase a contenido
            $_SESSION["username"]=$username;
            header("Location: index.php");
        } else{
            header("Location: login.php");
        }
        
        $statement->close();
        mysqli_close($dbconexion);
    } catch (\Throwable $th) {
        //throw $th;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

</head>
<body>
    <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Aceptar">
    </form>
    <p>¿No tienes cuenta?</p>
    <a href="registro.php">Registrate</a>
</body>
</html>
