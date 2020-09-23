<?php
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



?>