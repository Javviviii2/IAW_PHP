<?
session_start(); 

//aquí se comprueba si el usuario ha insertado un username y password
//utiliza la función hash('sha512',$password) para cifrar la contraseña
//si el username es test y la password cifrada coincide con el hash('sha512',"test")
//se trata de un usuario válido y debemos proceder a guardar el username en la sesión 
//y posteriormente usar la función header("Location: contenido.php"); para acceder
//a la parte privada de la aplicación
//Si el username y contraseña no coincide con test/test usaremos la función header
//header("Location: index.php"); para ir a la parte pública de la aplicación
if(isset($_POST['usuario']) && isset($_POST['password'])){
    $username=strtolower($_POST['usuario']);
    $password=hash('sha512',$_POST['password']);
    try {
        // variables para hacer la conexión a la BBDD
        $host="db";
        $dbUsername="root";
        $dbPassword="test";
        $dbName="Usuarios";
        //hacer conexión
        $dbconexion=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
        if ($dbconexion->connect_error) {
            die ;
        }
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
            header("Location: contenido.php");
        } else{
            header("Location: login.php");
        }
        $statement->close();
        $dbconexion->close();

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
