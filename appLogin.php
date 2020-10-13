<?php
/*Php Script dedicated for Blind + Low Vision mobile application*/
$usernameLogin = $_POST['Username'];
$passwordLogin = $_POST['Password'];

    /*Connect using SQL Server authentication.*/  
$serverName = "tcp:blv2020.database.windows.net,1433";  
$connectionOptions = array(  
    "Database" => "blvuserdata",  
    "UID" => "connection",  
    "PWD" => "blv2020@connecti0n"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
/*Check if user exists with credentials, if exists, return status as '200' else '404'*/      
    $Sql = "
    DECLARE @ID varchar(255)
    SET @ID = (SELECT Username FROM SupportUser WHERE Username='$usernameLogin' AND Password = '$passwordLogin');

    IF @ID IS NULL
        BEGIN
            SELECT '404' AS 'Status'
            SET NOEXEC ON
        END
    SELECT '200' AS 'Status';
    ";
    $stmt = sqlsrv_query($conn, $Sql, $params);
    $row_count = sqlsrv_has_rows( $stmt );
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);


/*Echo result back to sender*/    
if ($row_count === false){
        echo 404;
        exit;
        }    
    else{
        echo $row['Status'];
        exit;
    }
    ?>