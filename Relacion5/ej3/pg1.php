<?php
session_start();
// Crea un programa en PHP que guarde en sesión 2 variables (a y b) y se muestre el
// valor de cada una de las variables junto con un desplegable con las siguientes
// opciones:
//  a. incrementar a, sume 1 a la variable a
//  b. decrementar a, reste 1 a la variable a
//  c. incrementar b, sume 1 a la variable b
//  d. decrementar b, reste 1 a la variable b
//  e. borrar sesión, que destruya la sesión
?>
<?php
if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = 0;
  }
  if (!isset($_SESSION['b'])) {
    $_SESSION['b'] = 0;
  }
if (isset($_POST['opciones'])) {
    $opcion=$_POST['opciones'];
    switch ($opcion) {
        case '+a':
            $_SESSION['a'] ++;
            break;
        case '-a':
            $_SESSION['a'] --;
            break;
        case '+b':
            $_SESSION['b'] ++;
            break;
        case '-b':
            $_SESSION['b'] --;
            break;
        case 'reset':
            session_destroy(); // destruir sesión borra valores guardados
            header("Location: pg1.php");
            break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <p>A = <? echo $_SESSION['a'] ?></p>
        <p>B = <? echo $_SESSION['b'] ?></p>
        <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <select name="opciones">
                <option value="+a">Incrementar a</option>
                <option value="-a">Decrementar a</option>
                <option value="+b">Incrementar b</option>
                <option value="-b">Decrementar b</option>
                <option value="reset">Reinicar valores</option>
            </select>
            <input type="submit" value="Enviar">
        </form>

    </body>
</html>