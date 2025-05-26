<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "universe"; 

$con = mysqli_connect($servername, $username, $password, $dbname, 3307);

if (!$con) {
    echo "Db connection error: " . mysqli_connect_error();
}
?>
