<?php
// Realiza un conversor de euros a dólares. La cantidad en euros que se
// quiere convertir deberá estar almacenada en una variable.

# valor a convertir
if(isset($_POST["euros"]) && (is_numeric($_POST["euros"])))
{
    $euros=$_POST["euros"];
}else{
    $euros=0;
}
 
# calculo
$conversion=1.10;
$resultado=$conversion*$euros;
?>
<!DOCTYPE html>
<html>
<head></head>
 
<body>
    <h1>Conversor de Monedas</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
 
        <br><span>Euros</span>
            <input type="text" name="euros" value="<?php echo $euros?>">
 
        <br><span>Dollares</span>
            <input type="text" name="resultado" readonly value="<?php echo number_format($resultado,2,".",",")?>">
 
        <p><input type="submit" value="Calcular"></p>
    </form>
</body>
</html>
?>