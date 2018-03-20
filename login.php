<?php

include('classes/DB.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
//    echo $username . $password;
    if (DB::query('SELECT user_name FROM b_user WHERE user_name=:username', array(':username'=>$username))) {
        $passwordFromDB = DB::query('SELECT user_password FROM b_user WHERE user_name=:username', array(':username'=>$username))[0]['user_password'];

        if ($password == $passwordFromDB) {
            echo 'Logged in!';
            header('Location: index.php');
        } else {
            echo 'Incorrect Password!';
        }
    } else {
        echo 'User not registered!';
    }

}





















/*
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
*/
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Bank</title>
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a href="#"><img src="assets/images/logo.png" height="50px" width="150px"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li ><a href="index.php">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input class="form-control" placeholder="Search" type="text">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="login.php">Login<span class="sr-only">(current)</span></a></li>
                <li><a href="create-account.php">Open Account</a></li>
            </ul>
        </div>
    </div>
</nav>
<form class="form-horizontal" action="login.php" method="post">
    <fieldset class="login-form">
        <legend>Login</legend>
        <div class="form-group">
            <label for="inputUser" class="col-lg-2 control-label">Username</label>
            <div class="col-lg-10">
                <input class="form-control" name="username" id="inputUser" placeholder="Username" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
                <input class="form-control" name="password" id="inputPassword" placeholder="Password" type="password">
            </div>
        </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </div>
    </fieldset>
</form>
</body>
</html>






