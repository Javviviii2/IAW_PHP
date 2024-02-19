<?php
# Realiza un ejercicio en el que el usuario introduzca su edad y determine si
# es menor o mayor de edad.

$edad = readline("Introduce tu edad: ");
$condicion = ($edad>=18) ? 'Eres mayor de edad': 'Eres menor de edad';
echo $condicion;
?>

2. Realiza un ejercicio en el que el usuario introduzca un número y determine
si es positivo, negativo o cero.
a
<?PHP
$num = readline("Introduce un numero entero: ");

if ($num == 0) {
    echo 'El número es 0';
} elseif ($num >0) {
    echo 'El número es positivo';
} else {
    echo 'El número es negativo';
}
?>