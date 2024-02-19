<?php
// Crea una biblioteca de funciones matemáticas que contenga las siguientes
// funciones. Recuerda que puedes usar unas dentro de otras si es necesario.
// a. esCapicua: Devuelve verdadero si el número que se pasa como parámetro es capicúa y falso en caso contrario.
// b. esPrimo: Devuelve verdadero si el número que se pasa como parámetro es primo y falso en caso contrario.

function esCapicua($number){
    if (strval($number) == strrev($number) ) {
        return true;
    } else {
        return false;
    }
}

function esPrimo($number){
    $ind=2;
    $resto=1;
    while (($ind < $number) and ($resto > 0)) {
         $resto = $number % $ind;
         $ind++;
    }
    if ($resto == 0) {
        return false; // no primo
    } else {
        return true; // falso
    }
}
?>