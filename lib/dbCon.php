<?php
/*$serverName = "localhost";
$userName = "root";
$passWord = "";
$dbName = "vnexpress";*/

$serverName = "sql305.byethost10.com";
$userName = "b10_26206327";
$passWord = "**********";
$dbName = "b10_26206327_vnexpress";


$Conn = mysqli_connect($serverName, $userName, $passWord, $dbName);

if(!$Conn){
    die("Connection failed: ". mysqli_connect_error());
}















?>