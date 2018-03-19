<?php
include('DB_Connection/DBConnection.php');

// Creating DBConnection object
$DBConnect = new DBConnection;

// Creating connection to database
$DBConnect->createConnection();

// Getting connection variable
$connection = $DBConnect->getConnection();

// Getting result by SQL Query
$result = $DBConnect->read("SELECT * from `b_user`", $connection);

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $type_id = "";

    // Printing Result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row["user_name"] == $user_name && $row["user_password"] == $user_password) {
                //echo "welcome" . " " . $user_name;
                if ($row['type_id'] == 1) {
                   // echo "welcome" . " admin " . $user_name;
                    header("Location: /D_bank/admin.php");
                    die();
                } else if ($row['type_id'] == 2) {
                   // echo "welcome" . " user " . $user_name;
                    header("Location: /D_bank/loginUser.php");
                    die();
                }
            }
        }
    } else {
        echo "0 results";
    }
}

$DBConnect->closeConnection();
?>

