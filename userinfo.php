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

//Data calling
$Sql = "
BEGIN TRY
DECLARE @username varchar(255) = (Select Username from Login Where UserID = '$UserID')
DECLARE @email varchar(255) = (Select Email from Login Where UserID = '$UserID')
DECLARE @ID varchar(255)
SET @ID =(SELECT UserID FROM Login WHERE UserID 
= '$UserID')
IF (@ID = '$UserID')
	SELECT 
'SqlGet' AS 'Status', @username AS 'Username', @email AS 'Email', First_Name,Last_Name,Phone,Address,City,Postcode,State FROM UserInformation WHERE UserID = '$UserID';
ELSE 
	SELECT '404' AS 'Status'
	SET NOEXEC ON
END TRY
BEGIN CATCH
	SELECT '404' AS 'Status'
	SET NOEXEC ON
END CATCH

SET NOEXEC OFF;
";
  

$stmt = sqlsrv_query($conn, $Sql, $params);  
  
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    switch($row['Status']){
        case 404:
            echo $row['Status'];
            exit;
        case 'SqlGet':
            $arrayGet = array("username" => $row['Username'], "first_name" => $row['First_Name'], "last_name" => $row['Last_Name'], "Email" => $row['Email'], "phone" => $row['Phone'],"address" => $row['Address'],"city" => $row['City'],"zip" => $row['Postcode'],"state" => $row['State'] );
            echo json_encode($arrayGet);
            exit;
    }
    
}

sqlsrv_free_stmt( $stmt);
exit;
?>