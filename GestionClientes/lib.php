<?php
// conectarse a la base de datos
function conectarDB() 
{
    $host="db";
    $dbUsername="root";
    $dbPassword="test";
    $dbName="banco";
    $dbconexion = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    // Comprobar si hay errores de conexión
    if (!$dbconexion) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
        return false;
    }
    // Devolver la conexión a la base de datos
    return $dbconexion;
}

// Comprobar si existe usuario
function exist_user($user_dni) 
{
    $dbconexion = conectarDB(); // Connect to the database
    $check_user=$dbconexion->stmt_init();
    $check_user->prepare("SELECT * FROM cliente WHERE dni=?");
    $check_user->bind_param('s',$user_dni);
    $check_user->execute();
    $resultados=$check_user->get_result();
    return $resultados->num_rows > 0; //existe el usuario
    $check_user->close();
    $dbconexion->close();
}

// borrar usuario
function delete_user($dni)
{
    $dbconexion=conectarDB();
    $delete_user=$dbconexion->stmt_init();
    $delete_user->prepare('delete from cliente where dni = ?');
    $delete_user->bind_param('i',$dni);
    $delete_user->execute();
    $delete_user->close();
}

//añadir un usuario
function add_user ($dni,$nombre,$direccion,$telefono)
{
    if (isset($dni) && isset($nombre) && isset($direccion) && isset($telefono)) {
        if (!exist_user($dni)) {
            $dbconexion=conectarDB();
            $insertar_user=$dbconexion->stmt_init();
            $insertar_user->prepare('Insert Into cliente(dni,nombre,direccion,telefono) values (?,?,?,?)');
            $insertar_user->bind_param('ssss',$dni,$nombre,$direccion,$telefono);
            $insertar_user->execute();
            $insertar_user->close();
        } else {
            echo "El usuario con DNI: ".$dni." ya existe";
        }
    } else {
        header("Location: index.php");
    }
}

//modificar usuario
function modify_user($dni,$nombre,$direccion,$telefono,$dni_old)
{
    if (isset($dni) && isset($nombre) && isset($direccion) && isset($telefono) && isset($dni_old)) {
        if (!exist_user($dni)) {
            $dbconexion=conectarDB();
            $modify_user=$dbconexion->stmt_init();
            $modify_user->prepare("Update cliente Set dni=?,nombre=?,direccion=?,telefono=? Where dni=?");
            $modify_user->bind_param("sssss",$dni,$nombre,$direccion,$telefono,$dni_old);
            $modify_user->execute();
            $modify_user->close();
        } else {
            echo "El usuario con DNI: ".$dni." ya existe";
        }
    } else {
        header("Location: index.php");
    }
}

function show_data ()
{
    $dbconexion=conectarDB();
    $statement=$dbconexion->stmt_init();
    $statement->prepare("Select * from cliente");
    $statement->execute();
    $resultado=$statement->get_result();
    return $resultado;
}
?>