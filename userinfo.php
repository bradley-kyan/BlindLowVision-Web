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
		$sql = $sqlGet;
		break;
	case 002:
		$sql = $sqlUpdate;
		break;
}

$username = $_POST['username'];
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

SELECT First_Name,Last_Name,Phone,Address,City,Postcode,State FROM UserInformation WHERE UserID = '$UserID';

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



SET NOEXEC OFF;
";


$stmt = sqlsrv_query($conn, $Sql, $params);  
  
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      if($row['Status'] = 404){
		  echo $row['Status'];
		  exit;
	  }
	else{
		$array = array("username" => $row['Status'], "first_name" => $row['First_Name'], "last_name" => $row['Last_Name'], "Email" => $row['Phone'],"Email" => $row['Phone'],"Email" => $row['Phone'],"Email" => $row['Phone']);
		json_encode();
	}
}
sqlsrv_free_stmt( $stmt);

?>