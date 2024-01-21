<?php
// Realiza un ejercicio en el que usuario introduzca un número y determine si
// es par o impar.

$num = readline("Introduce un numero: ");

if ($num%2 == 0) {
    echo 'El número es par';
} else {
    echo 'El número es impar';
}
?>