<?php
// Realiza un ejercicio en el que el usuario introduzca un número del 1 al 7 y
// el determine qué día de la semana es.
$num = readline("Introduce un numero del 1 al 7: ");

switch ($num){
    case 1 : echo 'Lunes'; break;
    case 2 : echo 'Martes'; break;
    case 3 : echo 'Miércoles'; break;
    case 4 : echo 'Jueves'; break;
    case 5 : echo 'Viernes'; break;
    case 6 : echo 'Sábado'; break;
    case 7 : echo 'Domingo'; break;
}

?>