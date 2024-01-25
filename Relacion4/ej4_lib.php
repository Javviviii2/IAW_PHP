<?php
// Crea una biblioteca de funciones para arrays (de una dimensión) de números enteros que contenga las siguientes funciones:
// a. generaArrayInt: Genera un array de tamaño n con números aleatorios cuyo intervalo es 0, 100.
// b. minimoArrayInt: Devuelve el mínimo del array que se pasa como parámetro.
// c. maximoArrayInt: Devuelve el máximo del array que se pasa como parámetro.

function generaArrayInt($array_range){
    $array=array();
    for ($i=0; $i <$array_range;$i++) { 
        array_push($array,random_int(0,100));
    }
    return $array;
}
function minimoArrayInt($array){
    return min($array);
}
function maximoArrayInt($array){
    return max($array);
}
?>