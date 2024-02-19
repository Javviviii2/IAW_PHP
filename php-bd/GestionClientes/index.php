<?
include "lib.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestclient</title>
</head>
<body>
  <div style="background-color: lightblue;">
    <div >
      <h1 >GESTCLIENT</h1>
      <h2>Gestión de clientes de CertiBank</h2>
    <?php
    if (isset($_SESSION['username'])) {
      // Borrar cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
        $dni=$_GET['dni'];
        delete_user($dni);
      }
      // Añadir cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {
        $dni=$_GET['dni'];
        $nombre=$_GET['nombre'];
        $direccion=$_GET['direccion'];
        $telefono=$_GET['telefono'];
        add_user($dni,$nombre,$direccion,$telefono);
      }
      // Modificar cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
      $dni=$_GET['dni'];
      $nombre=$_GET['nombre'];
      $direccion=$_GET['direccion'];
      $telefono=$_GET['telefono'];
      $dni_old=$_GET['dniAntiguo'];
      modify_user($dni,$nombre,$direccion,$telefono,$dni_old);
      }
      //Listado.
      echo '
      <table>
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th></th>
        </tr>
          <form action="index.php" method="GET">
          <tr>
            <td><input type="text" name="dni"></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="direccion"></td>
            <td><input type="text" name="telefono"></td>
            <input type="hidden" name="accion" value="crear">
            <td><input type="submit" value="Añadir"></td>
          </tr>
        </form>';

        //mostrar los clientes
        $resultado=show_data();
        while ($registro=$resultado->fetch_assoc()) {
        echo "<tr>
            <td>".$registro['dni']." </td>
            <td>". $registro['nombre']." </td>
            <td>". $registro['direccion']." </td>
            <td>". $registro['telefono']." </td>
            <td>
              <a href=\"modificar.php?&dni=". $registro['dni'] ."&nombre=". $registro['nombre'] ."&direccion=". $registro['direccion'] . "&telefono=". $registro['telefono']." \">
                <button >Modificar</button>
              </a>
            </td>
            <td>
              <a href=\"index.php?accion=borrar&dni=". $registro['dni']."\">
                <button>
                  <img width='20px' src='papelera.png' >
                </button>
              </a>
            </td>
          </tr>";
        }
    }else {
      echo "<h2>No hay usuario en sesión. Salir, por favor";
    }
    ?>
      </table>
    </div>
    <a href="cerrarsesion.php"><button>Salir</button></a>
  </div>
</body>

</html>