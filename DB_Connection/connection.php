<?php
$servername= "localhost";
$username = "root";
$password = "abc";
$dbname = "b_m_wallet";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}else{
    echo "Connection Established";
}
?>
