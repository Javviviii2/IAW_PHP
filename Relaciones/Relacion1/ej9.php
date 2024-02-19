<?php
// Escribe un programa que muestre tu horario de clase mediante una tabla.
// Intercala código HTML y PHP para familiarizarte con éste último. Utiliza la
// etiqueta <table> de HTML.
$asignatura = array(
    ["8:15-9:15","Servicios en Red e Internet"],
    ["9:15-10:15","Empresa e Iniciativa Emprendedora"],
    ["10:15-11:15","Administración de Sistemas Operativos"],
    ["11:45-12:45","Implantación de Aplicaciones Web"],
    ["12:45-13:45","Administración de Sistemas de Gestión de Base de Datos"],
    ["13:45-14:45","Seguridad y Alta Disponibilidad"]
);
$diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
echo "<table>"; 
foreach ($diasSemana as $dia) {
    echo "<th>".$dia."</th>";
    foreach ($asignatura as $x) {
        // Generamos una fila de la tabla
        echo '<tr>';
        // Añadimos la celda de la hora
        echo '<td>' . $x[0] .'<br>'. '</td>';
        // Añadimos las asignaturas
        echo '<td>' . $x[1]. '</td>';
        // Terminamos la fila
        echo '</tr>';
    }
}
echo "</table>";
?>