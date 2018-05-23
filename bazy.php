<?php 

$dbHost = "localhost";
$dbUserName = "root";
$dbUserPassword = "root";
$dbName = "Test";


$dbConnect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);

if (!$dbConn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

