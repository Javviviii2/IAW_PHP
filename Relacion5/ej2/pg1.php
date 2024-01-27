<?php
// Escriba un programa que conste de dos páginas y que solicite una edad.
//  ● En la primera página se solicita una edad entre 18 y 130 años.
//  ● La segunda página comprueba si se ha escrito un número entero entre 18 y 130.
//      - Si se ha escrito un número entero entre 18 y 130, lo muestra.
//      - Si la edad se deja vacía, si no se escribe un número o si se escribe un
//        número que no esté comprendido entre 18 y 130, vuelve automáticamente a
//        la primera página, mostrando el aviso correspondiente.
?>
<?php
session_start();
if (isset($_POST['edad'])) {
    $_SESSION['edad'] = $_POST['edad'];
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
            <label>Edad</label>
            <input type="number" name="edad"><br>
            <input type="submit" value="Enviar">
        </form>
    </form>
</body>
</html>