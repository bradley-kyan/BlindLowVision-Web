<?php
/*Php Script dedicated for Blind + Low Vision mobile application*/
$UserID = $_POST['UserID'];

/*Connect using SQL Server authentication.*/  
$serverName = "tcp:blv2020.database.windows.net,1433";  
$connectionOptions = array(  
    "Database" => "blvuserdata",  
    "UID" => "connection",  
    "PWD" => "blv2020@connecti0n"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
/*Gets information of the user from their QR*/
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


//If error returns 404    
if ($row_count === false || $row['Status'] == 404){
        echo 404;
        exit;
        } 
//If success echoes data to sender in json format
    else{
        $array = array("FName"=>$row['First_Name'],"LName"=>$row['Last_Name'],"Balance"=>$row['Current_Donate']);
        //Encode array
        echo json_encode($array);
        exit;
    }
    ?>