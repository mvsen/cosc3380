<?php



$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";


$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);

if(!$conn){
    die("connection failed: " . mysqli_connect_error());

}