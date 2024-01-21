<?php
// Realiza un ejercicio en el que el usuario introduce dos números y
// determine si son iguales.

$num1 = readline("Introduce el numero 1: ");
$num2 = readline("Introduce el numero 2: ");

if ($num1 == $num2) {
    echo 'Los números son iguales';
} else {
    echo 'Los números son diferentes';
}
?>