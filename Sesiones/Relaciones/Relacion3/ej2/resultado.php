<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            # valor a convertir
            if(isset($_GET["euros"]) && (is_numeric($_GET["euros"]))){
                $euros=$_GET["euros"];
            }else{
                $euros=0;
            }
            # calculo
            $conversion=1.10;
            $dolares=$conversion*$euros;
            echo "$euros € euros son $dolares $ dolares";
        ?>
    </body>
</html>