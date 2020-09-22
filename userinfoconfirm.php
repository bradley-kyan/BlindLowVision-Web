<?php
/*Connect using SQL Server authentication.*/  
$serverName = "tcp:blv2020.database.windows.net,1433";  
$connectionOptions = array(  
    "Database" => "blvuserdata",  
    "UID" => "connection",  
    "PWD" => "blv2020@connecti0n"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
  
if ($conn === false)  
    {  
    die(print_r(sqlsrv_errors() , true));  
    }

//Cookie login get
if(!isset($_COOKIE['cookieUserLogin'])) {
  //cookie does not exist;
    echo 404;
    exit;
}
$cookieGet = $_COOKIE['cookieUserLogin'];
$cookieData = json_decode($cookieGet, true);

//UserId from login cookie
$UserID = $cookieData['UserID'];

$Password = $_POST['password'];

//Data calling

$Sql = "
BEGIN TRY
DECLARE @Password varchar(255) = (SELECT Password FROM Login WHERE UserID = '$UserID'); 
IF (@Password = '$Password')
    SELECT 'SqlLogin' AS 'Status';
ELSE 
	SELECT '404' AS 'Status'
END TRY
BEGIN CATCH
	SELECT '404' AS 'Status'
END CATCH
"; 

$stmt = sqlsrv_query($conn, $Sql, $params);  
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    switch($row['Status']){
        case 404:
            echo $row['Status'];
            exit;
        case 'SqlLogin':
            echo 200;
            exit;
    }
    
}

sqlsrv_free_stmt( $stmt);
exit;
?>