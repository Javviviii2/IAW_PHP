<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            # valor a convertir
            if(isset($_GET["dolares"]) && (is_numeric($_GET["dolares"]))){
                $dolares=$_GET["dolares"];
            }else{
                $dolares=0;
            }
            # calculo
            $conversion=0.92;
            $euros=$dolares*$conversion;
            echo "$dolares $ dolares son $euros € euros";
        ?>
    </body>
</html>