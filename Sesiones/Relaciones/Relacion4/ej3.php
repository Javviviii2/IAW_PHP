<?php
// Usando la librería del ejercicio 1. Muestra los números capicúa que hay entre 1 y 99.999.
include 'ej1_lib.php';
$number_array=array();
for ($number=0; $number <=99999 ; $number++) { 
    if (esCapicua($number)== true) {
        array_push($number_array,$number);
    } else{ 
        continue;
    }
}
print_r($number_array);
?>