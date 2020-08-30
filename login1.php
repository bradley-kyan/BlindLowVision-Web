<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, inital scale=1">
<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="icon" href="img/logo.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
<?php
$usernameLogin = $_POST['username'];
$passwordLogin = $_POST['password'];
    /*Connect using SQL Server authentication.*/  
$serverName = "tcp:blv2020.database.windows.net,1433";  
$connectionOptions = array(  
    "Database" => "blvuserdata",  
    "UID" => "connection",  
    "PWD" => "blv2020@connecti0n"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
      
    $Sql = "
    SELECT * FROM Login
    WHERE Username='$usernameLogin' OR Email='$usernameLogin' AND Password='$passwordLogin'
    ";
    $stmt = sqlsrv_query($conn, $Sql, $params);
    $row_count = sqlsrv_num_rows( $stmt );
    if ($row_count === false){
            echo json_encode(1);
        exit();
        }
    else {
         echo json_encode(0);
        exit();
    }
    ?>
</form>
</body>
</html>