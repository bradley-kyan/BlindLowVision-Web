<?php
//Gets data from cookie for generated QR Code

if(!isset($_COOKIE['cookieUserLogin'])) {
  //cookie does not exist;
    echo 404;
    exit;
}

$cookieGet = $_COOKIE['cookieUserLogin'];
$cookieData = json_decode($cookieGet, true);

//UserId from login cookie
$email = $cookieData['Email'];
$name1 = $cookieData['first_name'];
$UserID = $cookieData['UserID'];
echo $UserID;

?>
