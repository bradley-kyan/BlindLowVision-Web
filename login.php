<?php
$usernameLogin = $_POST['username11'];
$passwordLogin = $_POST['password11'];
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
    SET @ID = (SELECT UserID FROM Login WHERE (Username='$usernameLogin' OR Email='$usernameLogin') AND Password = '$passwordLogin');

    DECLARE @firstName varchar(255)
    SET @firstName = (SELECT First_Name FROM UserInformation WHERE UserID = @ID)    
    
    DECLARE @lastName varchar(255)
    SET @lastName = (SELECT Last_Name FROM UserInformation WHERE UserID = @ID)
    
    DECLARE @username varchar(255)
    SET @username = (SELECT Username FROM Login WHERE UserID = @ID)
    
    DECLARE @email varchar(255)
    SET @email = (SELECT Email FROM Login WHERE UserID = @ID)
    
    IF @ID IS NULL
        BEGIN
            SELECT '404' AS 'Status'
            SET NOEXEC ON
        END
    SELECT @firstName AS 'first_name', @lastName AS 'last_name', @ID AS 'UserID', @username AS 'Username', @email AS 'Email', 'Status' AS '200';
    ";
    $stmt = sqlsrv_query($conn, $Sql, $params);
    $row_count = sqlsrv_has_rows( $stmt );
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $UserID = $row['UserID'];
    $Username = $row['Username'];
    $Email = $row['Email'];
    

    
if ($row_count === false){
        echo 404;
        exit;
        }    
    else if($row['Status'] == 404){
        echo $row['Status'];
        exit;
    }
    else {
        echo 200;
        $array = array("username" => $Username, "password" => $passwordLogin, "first_name" => $firstName, "last_name" => $lastName, "UserID" => $UserID, "Email" => $Email);
        setcookie('cookieUserLogin',json_encode($array),"/");
        echo $_COOKIE[$cookieUserLogin];
        exit;
    }
    ?>