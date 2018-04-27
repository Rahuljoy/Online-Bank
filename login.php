<?php
include('classes/DB.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type_id = "";

    if (DB::query('SELECT user_name FROM bank_users WHERE user_name=:username', array(':username' => $username))) {
        $passwordFromDB = DB::query('SELECT user_password FROM bank_users WHERE user_name=:username', array(':username' => $username))[0]['user_password'];
        if ($password == $passwordFromDB) {
            $type_idFromDB = DB::query('SELECT type_id FROM bank_users WHERE user_name=:username', array(':username' => $username))[0]['type_id'];
            if ($type_idFromDB == 1) {
                header("location: admin.php");
            } else if ($type_idFromDB == 2) {

                $user_id = DB::query('SELECT user_id FROM bank_users WHERE user_name=:username', array(':username' => $username))[0]['user_id'];

                $cookie_name = "user_name";
                $cookie_value = $username;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


                $cookie_name = "user_id";
                $cookie_value = $user_id;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                header("location: user.php");
            }
        } else {
            echo 'Incorrect Password!';
        }
    } else {
        echo 'User not registered!';
    }
}
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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a href="#"><img src="assets/images/logo.png" height="50px" width="150px"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
            </ul>
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
            <label for="inputUser" class="col-lg-2 control-label">User name</label>
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
            <button type="submit" class="btn btn-primary" name="login">LogIn</button>
        </div>
    </fieldset>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>






