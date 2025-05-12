<?php

$servername = "localhost";
$username = "opaiir_root"; 
$password = "dEJ=aspo+kgG"; 
$dbname = "opaiir_data"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$user_ip = $_SERVER['REMOTE_ADDR'];

$sql = "SELECT * FROM denied_ips WHERE ip_address = '$user_ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    header("Location: http://www.google.com/");
    exit();
} else {
   
    include 'home.php';
}


$conn->close();
?>
