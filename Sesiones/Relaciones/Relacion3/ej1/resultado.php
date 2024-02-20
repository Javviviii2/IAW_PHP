<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if (isset($_GET["num1"],$_GET["num2"])) {
                $num1=$_GET["num1"];
                $num2=$_GET["num2"];
                echo $num1*$num2;
            } else {
                echo "Error";
            }
        ?>
    </body>
</html>