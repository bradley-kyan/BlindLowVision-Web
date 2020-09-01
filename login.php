<?php
$usernameLogin = $_POST['username11'];
$passwordLogin = $_POST['password11'];
    /*Connect using SQL Server authentication.*/  
$serverName = "tcp:blv2020.database.windows.net,1433";  
$connectionOptions = array(  
    "Database" => "blvuserdata",  
    "UID" => "connection",  
    "PWD" => "blv2020@connecti0n"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
      
    $Sql = "
    SELECT * FROM Login
    WHERE (Username='$usernameLogin' OR Email='$usernameLogin') AND Password='$passwordLogin'
    ";
    $stmt = sqlsrv_query($conn, $Sql, $params);
    $row_count = sqlsrv_has_rows( $stmt );
    if ($row_count === false){
        echo 404;
        exit;
        }
    else {
        echo 200;
        exit;
    }
    ?>