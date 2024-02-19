<?php
// Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle for, while y do-while.

// FOR
for ($i = 0; $i <= 100; $i++){
    if ($i % 5 == 0){
        echo "$i\n";
    } else{
        continue;
    }
}
// WHILE

$i = 0;
while ($i <= 100) {
    if ($i % 5 == 0){
        echo "$i\n";
    }
    $i++;
}

// DO-WHILE

$i = 0;
do {
    if ($i % 5 == 0){
        echo "$i\n";
    }
    $i++;
} while ($i <= 100)

?>