<?php
$UserID = $_POST['UserID'];

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
            SELECT First_Name, Last_Name, Current_Donate FROM UserInformation WHERE UserID = @ID;
        END
    ";
    $stmt = sqlsrv_query($conn, $Sql, $params);
    $row_count = sqlsrv_has_rows( $stmt );
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);


    
if ($row_count === false || $row['Status'] == 404){
        echo 404;
        exit;
        } 

    else{
        $array = array("FName"=>$row['First_Name'],"LName"=>$row['Last_Name'],"Balance"=>$row['Current_Donate']);
        echo json_encode($array);
        exit;
    }
    ?>