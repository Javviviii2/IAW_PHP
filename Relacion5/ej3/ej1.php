<?php
// Crea un programa en PHP que guarde en sesión 2 variables (a y b) y se muestre el
// valor de cada una de las variables junto con un desplegable con las siguientes
// opciones:
//  a. incrementar a, sume 1 a la variable a
//  b. decrementar a, reste 1 a la variable a
//  c. incrementar b, sume 1 a la variable b
//  d. decrementar b, reste 1 a la variable b
//  e. borrar sesión, que destruya la sesión
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="resultado.php" method="get">
        Número 1 = 
        <input type="number" name="num1"><br>
        Número 2 =
            <input type="number" name="num2"><br>
        <label for="operador">Operador</label>
            <select name="operadores" id="operador">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select><br>
            <input type="submit" value="Enviar">
        </form>

    </body>
</html>