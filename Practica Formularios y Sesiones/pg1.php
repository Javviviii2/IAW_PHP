<?php

function isValid($text){
    $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
    return preg_match($pattern, $text);
}
if (isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email']) ) {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    if (isValid($nombre)) {
        echo "<p>Nombre".$nombre."<br></p>";
    } else{
        echo "nombre error<br>";
    }
    if (filter_var($telefono,FILTER_VALIDATE_INT)) {
        if (strlen($telefono)<=9){
            if (substr($telefono,0) == "6" || substr($telefono,0) == "7" ){
                echo "<p>Telefono".$telefono."<br></p>";
            }
        }
    } else{
        echo "telefono error<br>";
    }
    if (filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
        echo "<p>email".$email."<br></p>";
    } else{
        echo "email error <br>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <input type="text" name="telefono" placeholder="Nombre"><br>
            <input type="text" name="nombre" placeholder="Telefono"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>