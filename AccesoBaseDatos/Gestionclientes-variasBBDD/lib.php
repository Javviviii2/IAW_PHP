<?php
// conectarse a la base de datos Banco
function conectarDB_banco() 
{
    $host="db";
    $dbclientname="root";
    $dbPassword="test";
    $dbName="banco";
    $dbconexion = mysqli_connect($host, $dbclientname, $dbPassword, $dbName);
    // Comprobar si hay errores de conexión
    if (!$dbconexion) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
        return false;
    }
    // Devolver la conexión a la base de datos
    return $dbconexion;
}
// conectarse a la base de datos Usuarios
function conectarDB_usuarios() 
{
    $host="db";
    $dbclientname="root";
    $dbPassword="test";
    $dbName="usuarios";
    $dbconexion = mysqli_connect($host, $dbclientname, $dbPassword, $dbName);
    // Comprobar si hay errores de conexión
    if (!$dbconexion) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
        return false;
    }
    // Devolver la conexión a la base de datos
    return $dbconexion;
}
/////////////////////////////////////////////////////////// Usuarios //////////////////////////////////
// comprobar si existe usuario en la base de datos
function exist_user($NombreUsuario)
{
    $dbconexion=conectarDB_usuarios();
    $check_user=$dbconexion->stmt_init();
    $check_user->prepare("Select * From usuarios Where usuario=?");
    $check_user->bind_param('s',$NombreUsuario);
    $check_user->execute();
    $resultado=$check_user->get_result();
    return $resultado->num_rows > 0; //existe el usuario
    $check_user->close();
    $dbconexion->close();
}
// Añadir usuario a la base de datos
function add_user ($NombreUsuario, $contraseña1)
{
    if (isset($NombreUsuario) && isset($contraseña1)) {
        if (!exist_user($NombreUsuario)) {
            $dbconexion=conectarDB_usuarios();
            $insertstatement=$dbconexion->stmt_init();
            $insertstatement->prepare('Insert Into usuarios(usuario,password) values (?,?)');
            $insertstatement->bind_param('ss', $NombreUsuario, $contraseña1);
            $insertstatement->execute();
            $insertstatement->close();
        } else {
            echo "Ya existe el usuario";
        }
    }
}

//login usuarios
function user_login ($NombreUsuario,$contraseña)
{
    $dbconexion=conectarDB_usuarios();
    $statement=$dbconexion->stmt_init();
    $statement->prepare('Select * From usuarios Where usuario = ? and password = ?');
    $statement->bind_param('ss',$NombreUsuario,$contraseña);
    $statement->execute();
    $resultado=$statement->get_result();
    return $resultado->num_rows == 1;
    $statement->close();
    $dbconexion->close();
}

//////////////////////////////////////////////////////// clientes //////////////////////////////////
// Comprobar si existe cliente
function exist_client($client_dni) 
{
    $dbconexion = conectarDB_banco(); // Connect to the database
    $check_client=$dbconexion->stmt_init();
    $check_client->prepare("SELECT * FROM cliente WHERE dni=?");
    $check_client->bind_param('s',$client_dni);
    $check_client->execute();
    $resultados=$check_client->get_result();
    return $resultados->num_rows > 0; //existe el cliente
    $check_client->close();
    $dbconexion->close();
}

// borrar cliente
function delete_client($dni)
{
    $dbconexion=conectarDB_banco();
    $delete_client=$dbconexion->stmt_init();
    $delete_client->prepare('delete from cliente where dni = ?');
    $delete_client->bind_param('i',$dni);
    $delete_client->execute();
    $delete_client->close();
}

//añadir un cliente
function add_client ($dni,$nombre,$direccion,$telefono)
{
    if (isset($dni) && isset($nombre) && isset($direccion) && isset($telefono)) {
        if (!exist_client($dni)) {
            $dbconexion=conectarDB_banco();
            $insertar_client=$dbconexion->stmt_init();
            $insertar_client->prepare('Insert Into cliente(dni,nombre,direccion,telefono) values (?,?,?,?)');
            $insertar_client->bind_param('ssss',$dni,$nombre,$direccion,$telefono);
            $insertar_client->execute();
            $insertar_client->close();
        } else {
            echo "El cliente con DNI: ".$dni." ya existe";
        }
    } else {
        header("Location: index.php");
    }
}

//modificar cliente
function modify_client($dni,$nombre,$direccion,$telefono,$dni_old)
{
    if (isset($dni) && isset($nombre) && isset($direccion) && isset($telefono) && isset($dni_old)) {
        if (!exist_client($dni)) {
            $dbconexion=conectarDB_banco();
            $modify_client=$dbconexion->stmt_init();
            $modify_client->prepare("Update cliente Set dni=?,nombre=?,direccion=?,telefono=? Where dni=?");
            $modify_client->bind_param("sssss",$dni,$nombre,$direccion,$telefono,$dni_old);
            $modify_client->execute();
            $modify_client->close();
        } else {
            echo "El cliente con DNI: ".$dni." ya existe";
        }
    } else {
        header("Location: index.php");
    }
}

// mostrar data de cliente
function show_data ()
{
    $dbconexion=conectarDB_banco();
    $statement=$dbconexion->stmt_init();
    $statement->prepare("Select * from cliente");
    $statement->execute();
    $resultado=$statement->get_result();
    return $resultado;
}
?>