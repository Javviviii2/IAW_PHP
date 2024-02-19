<?php
// Usando la librería del ejercicio 1. Muestra los números primos que hay entre 1 y 1000.
include 'ej1_lib.php';
$number_array=array();
for ($number=0; $number <1000 ; $number++) { 
    if (esPrimo($number)== true) {
        array_push($number_array,$number);
    } else{ 
        continue;
    }
}
print_r($number_array);
?>