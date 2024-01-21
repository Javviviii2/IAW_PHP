<?php
// Una persona sólo puede conducir si tiene carnet de conducir y si es mayor
// de 18 años. Haz un programa que pida por pantalla estas dos condiciones y
// determine si puede o no conducir.

$edad = readline("Introduce tu edad: ");
$carnet = readline("Tienes carnet? S(i) N(o): ");

if ($edad >= 18 and $carnet == 'S') {
    echo 'Puedes conducir';
} else {
    echo 'No puedes conducir';
}
?>