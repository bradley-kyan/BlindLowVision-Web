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

$sqlCallVar = $_POST[''];

switch($sqlCallVar){
	case 001:
		$Sql = $sqlGet;
		break;
	case 002:
		$Sql = $sqlUpdate;
		break;
	case 003:
		$Sql = $sqlLogin;
		break;        
}

$password = $_POST['password'];
$nameF = $_POST['nameF'];
$nameL = $_POST['nameL'];
$emailA = $_POST['emailA'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phoneN = $_POST['phoneN'];

//Data calling
$SqlGet = "
BEGIN TRY
DECLARE @ID varchar(255)
SET @ID = (SELECT UserID FROM Login WHERE UserID 
= '$UserID')
END TRY
BEGIN CATCH
    SELECT '404' AS 'Status'
    SET NOEXEC ON
END CATCH

DECLARE @username varchar(255) = (Select Username from Login Where UserID = '$UserID')
DECLARE @email varchar(255) = (Select Email from Login Where UserID = '$UserID')

SELECT 
'SqlGet' AS Status, @username AS 'Username', @email AS 'Email', First_Name,Last_Name,Phone,Address,City,Postcode,State FROM UserInformation WHERE UserID = '$UserID';

SET NOEXEC OFF;
";
  
$SqlUpdate = "
BEGIN TRY
DECLARE @ID varchar(255)
SET @ID = (SELECT UserID FROM Login WHERE UserID 
= '$UserID')
END TRY
BEGIN CATCH
    SELECT '404' AS 'Status'
    SET NOEXEC ON
END CATCH

UPDATE UserInformation
SET First_Name = '$nameF', Last_Name = '$nameL', Address = '$address', City = '$city', Postcode = '$zip', State = '$state'
WHERE UserId = '$UserID;

WAITFOR DELAY '00:00:00.010';

UPDATE Login
SET Username = '$username', Password = '$password' Email = '$emailA'
WHERE UserID = '$UserID';

SELECT 'SqlUpdate' AS Status,
SET NOEXEC OFF;
";

$SqlLogin = "
BEGIN TRY
DECLARE @ID varchar(255)
SET @ID = (SELECT UserID FROM Login WHERE UserID 
= '$UserID')
END TRY
BEGIN CATCH
    SELECT '404' AS 'Status'
    SET NOEXEC ON
END CATCH
";

$stmt = sqlsrv_query($conn, $Sql, $params);  
  
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    switch($row['Status']){
        case 404:
            echo $row['Status'];
            break;
        case 'SqlUpdate':
            $array = array("first_name" => $row['First_Name'], "last_name" => $row['Last_Name'], "Email" => $row['Email'],"username" => $row['Username'],"phone" => $row['Phone'],"address" => $row['Address'],"city" => $row['City'],"zip" => $row['Postcode'],"state" => $row['State']);
            echo json_encode($array);
            break;
        case 'SqlGet':
            
            break;
        case 'SqlLogin':
            
            break;
    }
    
}

sqlsrv_free_stmt( $stmt);
exit;
?>