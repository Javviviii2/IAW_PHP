<?php 
session_start();
if (isset($_POST['edad']) and is_numeric($_POST['edad'])) {
    $edad= $_POST['edad'];
    $_SESSION['edad']=$edad;
    if ($edad>18 and $edad<130) {
        header("Location: pg3.php");
    } else {
        header("Location: pg1.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <br><a href='pg1.php'>Volver</a>
    </body>
</html>