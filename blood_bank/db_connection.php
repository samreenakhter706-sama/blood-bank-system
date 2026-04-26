<?php
$host = "localhost";
$user = "root";  // aapka database username
$password = "";  // aapka database password
$dbname = "blood_bank";  // database name

$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>