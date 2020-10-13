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
--Check if userID is correct, if not exists, error caught returning 404 as status and stops script 
--execution through NOEXEC
BEGIN TRY
DECLARE @ID varchar(255)
SET @ID = (SELECT UserID FROM Login WHERE UserID 
= '$UserID')
END TRY
BEGIN CATCH
    SELECT '404' AS 'Status'
    SET NOEXEC ON
END CATCH

--Delay makes sql query await execution
WAITFOR DELAY '00:00:00.010';

--Sets current donate value to zero if value is null allowing math op
DECLARE @var varchar(255)
SET @var = (Select Current_Donate from UserInformation Where UserID = '$UserID')
IF @var IS NULL
	BEGIN
        UPDATE UserInformation
        SET Current_Donate = 0
        WHERE UserID = '$UserID';
	END
--Sets total donate value to zero if value is null allowing math op
DECLARE @var2 varchar(255)
SET @var2 = (Select Total_Donate from UserInformation Where UserID = '$UserID')
IF @var2 IS NULL
	BEGIN
        UPDATE UserInformation
        SET Total_Donate = 0
        WHERE UserID = '$UserID';
	END
    
--Update total donate addition math
UPDATE UserInformation
SET Total_Donate = Total_Donate + '$donateAmount'
WHERE UserID = '$UserID';

--Update current donate addition math
UPDATE UserInformation
SET Current_Donate = Current_Donate + '$donateAmount'
WHERE UserID = '$UserID';
WAITFOR DELAY '00:00:00.010';

--Inserts new transaction record
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