<?php
// Escribe un programa que genere 15 números aleatorios y que los almacene en un array.
// Rota los elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la
// posición 1, el de la 1 a la 2, etc. El número que se encuentra en la última posición debe
// pasar a la posición 0. Finalmente, muestra el contenido del array del inicio y el array rotado..

function rotar_array($array) {
        $ultimo_elemento = $array[count($array) - 1];
        for ($i = count($array) - 1; $i > 0; $i--) {
            $array[$i] = $array[$i - 1];
        }
        $array[0] = $ultimo_elemento;
        return $array;
    }
    
    $array = [];
    for ($i = 0; $i < 15; $i++) {
        $array[] = rand(0, 100);
    }
    
    echo "Array original:";
    print_r($array);
    
    $array_rotado = rotar_array($array);
    
    echo "Array rotado:";
    print_r($array_rotado);
?>