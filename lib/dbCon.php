<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$dbName = "vnexpress";


$Conn = mysqli_connect($serverName, $userName, $passWord, $dbName);

if(!$Conn){
    die("Connection failed: ". mysqli_connect_error());
}















?>