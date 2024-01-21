<?php
// Muestra la tabla de multiplicar de un número introducido por teclado.

$num = readline("Introduzca el numero:");
for ($i=0; $i <= 10; $i++){
    $tabla=$i*$num;
    echo "$num x $i = $tabla\n";
}
?>