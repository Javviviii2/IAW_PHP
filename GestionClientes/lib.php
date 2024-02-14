<?php
function if_exist_user($user_dni) {
    if (isset($_GET['accion'])) { // Check if 'accion' parameter exists in GET request
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "banco";

        // Connect to the database
        $dbconexion = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        // Check for connection errors
        if (!$dbconexion) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare the query with placeholder for safety
        $check_query = "SELECT COUNT(*) FROM cliente WHERE dni=$user_dni";

        // Prepare the statement for safe query execution
        $stmt = mysqli_prepare($dbconexion, $check_query);

        /*
        // Check for statement preparation errors
        if (!$stmt) {
            die("Statement preparation failed: " . mysqli_error($dbconexion));
        }

        // Bind parameter to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", ""); // Bind empty string for placeholder
        */

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check for errors accessing the result
        if (!$result) {
            die("Result retrieval failed: " . mysqli_stmt_error($stmt));
        }

        // Fetch the count (assuming you only need the existence check)
        $row = mysqli_fetch_assoc($result);
        $count = $row['COUNT(*)'];

        if ($count > 0) {
           true;
        } else {
            false;
        }

        // Close resources
        mysqli_stmt_close($stmt);
        mysqli_close($dbconexion);
    }
}

// Immediately call the function if 'accion' exists


?>