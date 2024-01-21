<?php
// Escribe un programa que muestre los n primeros términos de la serie de Fibonacci. El
// primer término de la serie de Fibonacci es 0, el segundo es 1 y el resto se calcula sumando
// los dos anteriores, por lo que tendríamos que los términos son 0, 1, 1, 2, 3, 5, 8, 13, 21, 34,
// 55, 89, 144... El número n se debe introducir por teclado.

$num = readline("Introduzca el numero:");
$fib1 = 0;
$fib2 = 1;
if ($num == 0){
    echo $fib1 . "\n";
} elseif ($num == 1) {
    echo $fib2 . "\n";
} else {
    for ($i=0; $i <= $num; $i++){
        $fib = $fib1 + $fib2;
        $fib1 = $fib2;
        $fib2 = $fib;
        echo $fib . "\n";
    }
}
?>