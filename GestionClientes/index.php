<?php

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
      include "lib.php";
      // Conexión a la base de datos
      $host="db";
      $dbUsername="root";
      $dbPassword="test";
      $dbName="banco";
      $dbconexion=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
      // pruebas
      
      // Dar de baja un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
      //hacer llamada a BD con la consulta oportuna
      $dni=$_GET['dni'];
      $delete_user=$dbconexion->stmt_init();
      $delete_user->prepare('delete from cliente where dni = ?');
      $delete_user->bind_param('i',$dni);
      $delete_user->execute();
      $delete_user->close();
      }

      // Dar de alta un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {
      //hacer llamada a BD con la consulta oportuna
      $dni=$_GET['dni'];
      $nombre=$_GET['nombre'];
      $direccion=$_GET['direccion'];
      $telefono=$_GET['telefono'];
      $check=if_exist_user($dni);
      if ($check == true) {
        echo "Ya existe el usuario";
      } else {
        $insertar_user=$dbconexion->stmt_init();
        $insertar_user->prepare('Insert Into cliente(dni,nombre,direccion,telefono) values (?,?,?,?)');
        $insertar_user->bind_param('issi',$dni,$nombre,$direccion,$telefono);
        //ejecutar
        $insertar_user->execute();
        // cerrar
        $insertar_user->close();
      }
      }

      // Modificar un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
      //hacer llamada a BD con la consulta oportuna
      // preparar datos
      $dni=$_GET['dni'];
      $nombre=$_GET['nombre'];
      $direccion=$_GET['direccion'];
      $telefono=$_GET['telefono'];
      $dni_old=$_GET['dniAntiguo'];
      //preparar consula
      $update_query="update cliente set dni='$dni',nombre='$nombre', direccion='$direccion', telefono='$telefono' where dni='$dni_old'";
      mysqli_query($dbconexion,$update_query);
      }

      // Listado
      //Este listado se muestra siempre
      //hacer llamada a BD con la consulta del listado de clientes

      ?>

      <table >
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
        </form>

        <?php
        //mostrar los clientes de la bd en la tabla
        // Crear query
        $query="Select * from cliente";
        //iniciar, preparar y ejecutar statement
        $statement=$dbconexion->stmt_init();
        $statement->prepare($query);
        $statement->execute();
        // guardar los resultados del statement
        $resultado=$statement->get_result();
        while ($registro =$resultado->fetch_assoc()) {//hay que modificar el array() y cambiarlo por el código adecuado
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
        ?>
      </table>
    </div>
    <a href="cerrarsesion.php"><button>Salir</button></a>
  </div>



</body>

</html>