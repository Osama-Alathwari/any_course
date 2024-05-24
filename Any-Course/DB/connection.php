<?php

$hostname = "localhost";
$database_name = "anycourses";
$database_user = "root";
$database_password = "";

$dsn = "mysql:host=$hostname;dbname=$database_name";

//$conn = new PDO($dsn , $database_user , $database_password);
$conn=new mysqli($hostname,$database_user,$database_password,$database_name);
?>
