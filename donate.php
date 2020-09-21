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

//Data calling

$Sql = "
BEGIN TRY
DECLARE @ID varchar(255)
SET @ID =(SELECT UserID FROM Login WHERE UserID 
= '$UserID')
IF (@ID = '$UserID')
	SELECT '200' AS 'Status'
ELSE 
	SELECT '404' AS 'Status'
	SET NOEXEC ON
END TRY
BEGIN CATCH
	SELECT '404' AS 'Status'
	SET NOEXEC ON
END CATCH

WAITFOR DELAY '00:00:00.010';

DECLARE @var varchar(255)
SET @var = (Select Current_Donate from UserInformation Where UserID = '$UserID')
IF @var IS NULL
	BEGIN
        UPDATE UserInformation
        SET Current_Donate = 0
        WHERE UserID = '$UserID';
	END

DECLARE @var2 varchar(255)
SET @var2 = (Select Total_Donate from UserInformation Where UserID = '$UserID')
IF @var2 IS NULL
	BEGIN
        UPDATE UserInformation
        SET Total_Donate = 0
        WHERE UserID = '$UserID';
	END

UPDATE UserInformation
SET Total_Donate = Total_Donate + '$donateAmount'
WHERE UserID = '$UserID';
    
UPDATE UserInformation
SET Current_Donate = Current_Donate + '$donateAmount'
WHERE UserID = '$UserID';

WAITFOR DELAY '00:00:00.010';

INSERT INTO Transactions
(UserID,Transaction_Amount,CC_Number,CC_Exp,CC_Name,CC_Address,CC_City,CC_State)
VALUES ((SELECT UserID FROM Login WHERE UserID ='$UserID'),'$donateAmount',?,?,?,?,?,?);

WAITFOR DELAY '00:00:00.010';

SET NOEXEC OFF;
";
    
$params = array(&$_POST['ccNumber'], &$_POST['ccExp'], &$_POST['ccName'], 
                &$_POST['address'], &$_POST['city'], &$_POST['state']
);  

$stmt = sqlsrv_query($conn, $Sql, $params);  
  
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['Status'];
}
sqlsrv_free_stmt( $stmt);
?>