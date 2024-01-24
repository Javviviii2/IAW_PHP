<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if (isset($_GET["num1"]) and isset($_GET["num2"]) and isset($_GET["operador"])) {
                if (is_numeric($_GET["num1"]) and is_numeric($_GET["num2"])) {
                    $num1=$_GET["num1"];
                    $num2=$_GET["num2"];
                    $operador=$_GET["operador"];
                    
                    if ($operador == "+") {
                        echo $resultado = $num1 + $num2;
                    } elseif ($operador == "-") {
                        echo $resultado = $num1 - $num2;
                    } elseif ($operador == "*"){
                        echo $resultado = $num1 * $num2;
                    } elseif ($operador == "/"){
                        echo $resultado = $num1 / $num2;
                    } else {
                        echo "error";
                    }
                
                }
            } else {
                echo "Error";
            }
            
        ?>
        <br><a href="formulario.php">Volver a la calculadora</a>
    </body>
</html>