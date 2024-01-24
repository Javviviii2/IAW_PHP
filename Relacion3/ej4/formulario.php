<?php
// Escribe un programa que sume, reste, multiplique y divida dos números introducidos por un formulario.
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="resultado.php" method="get">
        Número 1:
        <input type="number" name="num1"><br>
        <label for="operador">Operador</label>
            <select name="operadores" id="operador">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select><br>
        Número 2:
            <input type="number" name="num2"><br>
            <input type="submit" value="Enviar">
        </form>

    </body>
</html>