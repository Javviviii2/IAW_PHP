<?php
// Usando la librería del ejercicio 4. Muestra el número máximo y mínimo de un array de enteros de tamaño 10 generado aleatoriamente.
include 'ej4_lib.php';
$array=generaArrayInt(10);
echo "El máximo de la array es: ".maximoArrayInt($array)." y el mínimo es: ".minimoArrayInt($array)."\n";
?>