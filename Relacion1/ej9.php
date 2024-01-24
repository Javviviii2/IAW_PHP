<?php
// Escribe un programa que muestre tu horario de clase mediante una tabla.
// Intercala código HTML y PHP para familiarizarte con éste último. Utiliza la
// etiqueta <table> de HTML.
$asignatura = array(
    "Servicios en Red e Internet",
    "Empresa e Iniciativa Emprendedora",
    "Administración de Sistemas Operativos",
    "Implantación de Aplicaciones Web",
    "Administración de Sistemas de Gestión de Base de Datos",
    "Seguridad y Alta Disponibilidad"
);
$horas = array(
    "8:15-9:15",
    "9:15-10:15",
    "10:15-11:15",
    "11:45-12:45",
    "12:45-13:45",
    "13:45-14:45"
);

// Recorremos el array de horas
foreach ($horas as $asignatura) {

    // Generamos una fila de la tabla
    echo '<tr>';

    // Añadimos la celda de la hora
    echo '<td>' . $hora . '</td>';

    // Añadimos la celda de la asignatura
    echo '<td>' . $asignatura . '</td>';

    // Terminamos la fila
    echo '</tr>';
}

?>

<!DOCTYPE html>
<head></head>
<body>
    <table>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>

    </table>

</body>