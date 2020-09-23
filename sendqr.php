<?php
require 'vendor/autoload.php';

ini_set('display_errors', 1);
if(!isset($_COOKIE['cookieUserLogin'])) {
  //cookie does not exist;
    echo 404;
    exit;
}

$cookieGet = $_COOKIE['cookieUserLogin'];
$cookieData = json_decode($cookieGet, true);

//UserId from login cookie
$email1 = $cookieData['Email'];
$name1 = $cookieData['first_name'];
$UserID1 = $cookieData['UserID'];
$src1 = "https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=";
$src1 .= $UserID1;

$email = new \SendGrid\Mail\Mail();
$email->setFrom("norelpy@blindlowvision.com", "Kyan Bradley");
$email->setSubject("Blind Low Vision - Your Code!");
$email->addTo("$email1", "$name1");
$email->addDynamicTemplateDatas(['id' => "$UserID1",'firstName' => "$name1",'src' => "$src1"]);
$apiKey = 'Bearer SG.gpB9pM-tRkivz3Qtl8PFpg.e7hXn-6Ps3-zAdX3HMXggaXy8Gdna-SB-yHh7hXrAS4';
$sg = new \SendGrid($apiKey);

try {
    $response = $sg->client->suppression()->bounces()->get();
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}
