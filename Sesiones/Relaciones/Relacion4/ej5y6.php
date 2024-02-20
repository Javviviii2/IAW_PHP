<?php
// Usando la librería del ejercicio 4. Muestra el número mínimo de un array de enteros de tamaño 10 generado aleatoriamente.
include 'ej4_lib.php';
$array=generaArrayInt(10);
echo "La array es: ".implode(",",$array)."\n";
// Usando la librería del ejercicio 4. Muestra el número máximo y mínimo de un array de enteros de tamaño 10 generado aleatoriamente.
echo "El máximo de la array es: ".maximoArrayInt($array)." y el mínimo es: ".minimoArrayInt($array)."\n";
?>