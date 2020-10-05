<?php
$UserID = $_POST['UserID'];
$Value = $_POST['Value'];

/*Connect using SQL Server authentication.*/  
$serverName = "tcp:blv2020.database.windows.net,1433";  
$connectionOptions = array(  
    "Database" => "blvuserdata",  
    "UID" => "connection",  
    "PWD" => "blv2020@connecti0n"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
      
    $Sql = "
    DECLARE @ID varchar(255)
    SET @ID = (SELECT UserID FROM UserInformation WHERE UserID='$UserID');

    IF @ID IS NULL
        BEGIN
            SELECT '404' AS 'Status'
            SET NOEXEC ON
        END
    ELSE
        BEGIN
            UPDATE UserInformation
            SET Current_Donate = Current_Donate - '$Value'
            WHERE UserID = @ID;
        END
        WAITFOR DELAY '00:00:00.010';
        SELECT '200' AS 'Status';
    SET NOEXEC OFF
    ";
    $stmt = sqlsrv_query($conn, $Sql, $params);
    $row_count = sqlsrv_has_rows( $stmt );
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);


    
echo $row['Status'];
exit;

?>