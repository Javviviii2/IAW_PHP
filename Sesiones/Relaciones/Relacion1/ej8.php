<?php
// Determinar el tipo de triángulo. Haz un programa que pida la longitud de
// los tres lados de un triángulo y determine si es triángulo equilátero, isósceles
// o escaleno.

$lado1 = readline("Introduce la longitud (cm) del lado 1: ");
$lado2 = readline("Introduce la longitud (cm) del lado 2: ");
$lado3 = readline("Introduce la longitud (cm) del lado 3: ");

if ($lado1 == $lado2 and $lado2 == $lado3) {
    echo "Equilatero\n";
} elseif ($lado1 == $lado2 or $lado1 == $lado3 or $lado2 == $lado3  ) {
    echo "Isósceles\n";
} else {
    echo "Escaleno\n";
}
?>