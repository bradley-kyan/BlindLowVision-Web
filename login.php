<html>
<head>
<meta charset="utf-8">
<title>Blind Low Vision NZ - Register</title>
<meta name="viewport" content="width=device-width, inital scale=1">
<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="icon" href="img/logo.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<style>
.btn-submit-content {
    background-color: #1A73E8;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    padding-bottom: 5px;
    padding-top: 5px;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 2em;
}
.btn-submit-content:hover {
    background-color: #71A8F0;
    color: #FFFFFF;
    transition: background-color .2s;
}
.btn-submmit-content:not(:hover) {
    transition: background-color .2s;
}
</style>
</head>
<body>
    <form id="lForm" method="post">
        <div class="form-group">
            <label for="Username">Username / Email</label>
            <input type="name" class="form-control" name="UsernameLogin" id="UsernameLogin" placeholder="myusername" required>
        </div>
        <div class="form-group">
            <label for="Username">Password</label>
            <input type="password" class="form-control" name="PasswordLogin" id="PasswordLogin" placeholder="**********" required>
        </div>
    </form>
<button type="button" onClick="" class="btn-submit-content" style="margin-bottom: 15px">Login</button>
    <?php
    $usernameLogin = $_POST['UsernameLogin'];
    $passwordLogin = $_POST['PasswordLogin'];
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
    
    $Sql = "
    SELECT Username, Password, Email FROM Login
    WHERE (Username='$usernameLogin' OR Email='$usernameLogin') AND Password='$passwordLogin'
    ";
    
    
    $stmt = sqlsrv_query($conn, $Sql, $params);  
    if ($stmt === false)  
        {  
        $errors = sqlsrv_errors();  
        if ($errors[0]['code'] == 2601)  
            {  
            echo "An error occured.</br>";  
            }  
  
        /*Die if other errors occurred.*/  
            else  
            {  
            die(print_r($errors, true));  
            }  
        }
    
    ?>
    
</body>
</html>