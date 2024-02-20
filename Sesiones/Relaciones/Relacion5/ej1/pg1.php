<?php 
// Escriba un programa que conste de dos páginas y que solicite un nombre.
//  * En la primera página se solicita el nombre.
//  * La segunda página comprueba si se ha escrito algo de texto.
//    - Si se ha escrito algo de texto, lo muestra.
//    - Si no se ha escrito ningún texto, vuelve automáticamente a la primera página.

// usar sessions()
?>
<?php
session_start();
if (isset($_SESSION['nombre'])) {
    echo "Último nombre usado:". $_SESSION['nombre'];
}
;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="pg2.php" method="post">
            <label>Nombre</label>
            <input type="text" name="nombre"><br>
            <input type="submit" value="Enviar">
        </form>
    </form>
</body>
</html>