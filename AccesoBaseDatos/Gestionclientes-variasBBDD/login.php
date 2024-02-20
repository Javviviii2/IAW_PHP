<?
session_start(); 
include "lib.php";
if(isset($_POST['usuario']) && isset($_POST['password'])){
    $username=strtolower($_POST['usuario']);
    $password=hash('sha512',$_POST['password']);
    try {
        if (user_login($username,$password)) {
            $_SESSION["username"]=$username;
            header("Location: index.php");
        } else{
            header("Location: login.php");
        }
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
    <h2>Login</h2>
    <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Aceptar">
    </form>
    <p>¿No tienes cuenta?</p>
    <a href="registro.php"><button>Registrarse</button></a>
</body>
</html>
