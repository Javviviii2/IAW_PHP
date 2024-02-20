<?php
// Define tres arrays de 20 números enteros cada una, con nombres “número”, “cuadrado” y
// “cubo”. Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado”
// se deben almacenar los cuadrados de los valores que hay en el array “numero”. En el array
// “cubo” se deben almacenar los cubos de los valores que hay en “número”. A continuación,
// muestra el contenido de los tres arrays dispuestos en tres columnas.
?>
<!DOCTYPE html>
<head></head>
<body>
    <table border="1">
        <tr>
            <th>Número</th>
            <th>Cuadrado</th>
            <th>Cubo</th>
        </tr>
<?php
    $numero=[];
    $cuadrado=[];
    $cubo=[];
    for ($i=0; $i <= 20; $i++){
        $numero[$i]=rand(0,100);
        $cuadrado[$i]=$numero[$i]*$numero[$i];
        $cubo[$i]=$cuadrado[$i]*$numero[$i];
        echo "<tr>";
        echo "<td>".$numero[$i]."</td>";
        echo "<td>".$cuadrado[$i]."</td>";
        echo "<td>".$cubo[$i]."</td>";
        echo "</tr>";
    }
// tabla => un for y en el echo pongo el código html
?>
</table>
</body>