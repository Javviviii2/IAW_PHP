<?php
// Realiza un ejercicio en el que el usuario introduzca 3 números y determine
// cuál de los tres es mayor.

$num1 = readline("Introduce el numero 1: ");
$num2 = readline("Introduce el numero 2: ");
$num3 = readline("Introduce el numero 3: ");

$numeros = array($num1,$num2,$num3);
echo 'El número mayor es: ' . max($numeros);
?>