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
/*Insert data.*/
$username = $_POST['Username'];
$email = $_POST['EmailA'];
if ($_POST["Notify"] == "1"){
    $notify = 1;
    }
    else {
    $notify = 0;   
    };
if ($_POST["event1"] == "1"){
    $event1 = 1;
    }
    else {
    $event1 = 0;   
    };
if ($_POST["event2"] == "1"){
    $event2 = 1;
    }
    else {
    $event2 = 0;   
    };
    $exists = 0;
$Sql = "
DECLARE @username varchar(255)
SET @username = (SELECT Username FROM Login WHERE Username 
= '$username')
    IF @username = '$username'
    BEGIN
        SELECT '404' AS 'Status'
        SET NOEXEC ON
    END
    
WAITFOR DELAY '00:00:00.010';

INSERT INTO Login (Username,Password,Email)   
VALUES (?,?,?);

WAITFOR DELAY '00:00:00.010';

INSERT INTO UserInformation
(UserID,First_Name,Last_Name,Phone,Address,City,Postcode,State)
VALUES ((SELECT UserID FROM Login WHERE Username='$username'),?,?,?,?,?,?,?);

INSERT INTO Notification(UserID,Notify,event1,event2)
VALUES ((SELECT UserID FROM Login WHERE Username='$username'),'$notify','$event1','$event2');

WAITFOR DELAY '00:00:00.010';
SET NOEXEC OFF;
";
    
$params = array(&$_POST['Username'], &$_POST['Password'], &$_POST['EmailA'],
                &$_POST['NameF'], &$_POST['NameL'], &$_POST['PhoneN'], &$_POST['AddressShip'], &$_POST['CityA'], &$_POST['ZipCode'], &$_POST['StateA']
);  
    $stmt = sqlsrv_query($conn, $Sql, $params);  

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['Status'];
}
sqlsrv_free_stmt( $stmt);
?>