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
$donateAmount = $_POST['donateAmount'];
//UserId from login cookie
$UserID = $cookieData['UserID'];

$passwordN = $_POST['passwordN'];
$nameF = $_POST['nameF'];
$nameL = $_POST['nameL'];
$emailA = $_POST['emailA'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phoneN = $_POST['phoneN'];

//Data calling
$Sql = "
BEGIN TRY

DECLARE @ID varchar(255) = (SELECT UserID FROM Login WHERE UserID 
= '$UserID');

IF (@ID = '$UserID')
	
	BEGIN
    UPDATE UserInformation
    SET First_Name = '$nameF', Last_Name = '$nameL', Address = '$address', City = '$city', Postcode = '$zip', State = '$state'
    WHERE UserId = '$UserID';

    UPDATE Login
    SET Password = '$passwordN', Email = '$emailA'
    WHERE UserID = '$UserID';

    SELECT 'SqlUpdate' AS 'Status';
	END
    
ELSE 
	BEGIN
	SELECT '404' AS 'Status'
	END
    
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
        case 'SqlUpdate':
            echo 200;
            exit;
    }
    
}

sqlsrv_free_stmt( $stmt);
?>