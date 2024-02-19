<?php
// Realiza un ejercicio en el que el usuario introduzca un número y determine
// si es positivo, negativo o cero.

$num = readline("Introduce un numero entero: ");

if ($num == 0) {
    echo 'El número es 0';
} elseif ($num >0) {
    echo 'El número es positivo';
} else {
    echo 'El número es negativo';
}
?>