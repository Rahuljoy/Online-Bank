<?php

include('DB_Connection/DBConnection.php');

// Creating DBConnection object
$DBConnect = new DBConnection();

// Creating connection to database
$DBConnect->createConnection();

// Getting connection variable
$connection = $DBConnect->getConnection();

// Getting result by SQL Query
$result = $DBConnect->read("SELECT * from `b_user`", $connection);

// Printing Result
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"] . " - Name: " . $row["user_name"] . " - password: " . $row["user_password"] . "<br>";
    }
} else {
    echo "0 results";
}

$DBConnect->closeConnection();
?>
