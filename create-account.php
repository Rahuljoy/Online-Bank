<?php

include('classes/DB.php');

if (isset($_POST['createaccount'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username' => $username))) {

        if (strlen($username) >= 3 && strlen($username) <= 32) {

            if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                if (strlen($password) >= 6 && strlen($password) <= 60) {

                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                        if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email' => $email))) {

                            DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'0\', \'\')', array(':username' => $username, ':password' => password_hash($password, PASSWORD_BCRYPT), ':email' => $email));
                            Mail::sendMail('Welcome to The Circle!', 'Your account has been created!', $email);
                            header('Location: http://localhost/the_circle/login.php');
                        } else {
                            echo 'Email in use!';
                        }
                    } else {
                        echo 'Invalid email!';
                    }
                } else {
                    echo 'Invalid password!';
                }
            } else {
                echo 'Invalid username';
            }
        } else {
            echo 'Invalid username';
        }

    } else {
        echo 'User already exists!';
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
    <link rel="stylesheet" href="assets/datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="assets/datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
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
                <li><a href="login.php">Login</a></li>
                <li class="active"><a href="create-account.php">Open Account<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<form class="form-horizontal" action="login.php" method="post">
    <fieldset class="login-form">
        <legend>Create Account</legend>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">User Info</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputFirstName" class="col-lg-2 control-label">Firstname</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="firstname" id="inputFirstName" placeholder="First Name"
                                       type="text">
                            </div>
                        </div><!--First Name-->
                        <div class="form-group">
                            <label for="inputMiddleName" class="col-lg-2 control-label">Middlename</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="middlename" id="inputMiddleName"
                                       placeholder="Middle Name"
                                       type="text">
                            </div>
                        </div><!--Middle Name-->
                        <div class="form-group">
                            <label for="inputLastName" class="col-lg-2 control-label">Lastname</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="lastname" id="inputLastName" placeholder="Last Name"
                                       type="text">
                            </div>
                        </div><!--Last Name-->
                        <div class="form-group">
                            <label for="gender" class="col-lg-2 control-label">Gender</label>
                            <div class="col-lg-10">
                                <select name="gender" class="form-control" id="select">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Not want to mention</option>
                                </select>
                            </div>
                        </div><!--Gender-->
                        <div class="form-group">
                            <label for="dateOfBirth" class="col-lg-2 control-label">Date of Birth</label>
                            <div class='input-group date col-lg-10' id='datetimepicker1'>
                                <input name="dateofbirth" type='text' class="form-control" placeholder="Input Date of Birth" />
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div><!--Date of Birth-->
                        <div class="form-group">
                            <label for="inputContactNumber" class="col-lg-2 control-label">Contact Number</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="contactnumber" id="inputContactNumber" placeholder="Contact Number"
                                       type="text">
                            </div>
                        </div><!--Contact Number-->
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="email" id="inputEmail" placeholder="Email"
                                       type="email">
                            </div>
                        </div><!--Email-->
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">User Address</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputAddress" class="col-lg-2 control-label">Address</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="address" id="inputAddress" placeholder="Address"
                                       type="text">
                            </div>
                        </div><!--Address-->
                        <div class="form-group">
                            <label for="addressState" class="col-lg-2 control-label">Present/Permanent</label>
                            <div class="col-lg-10">
                                <select name="addressState" class="form-control" id="select">
                                    <option>Present</option>
                                    <option>Permanent</option>
                                </select>
                            </div>
                        </div><!--Present or Permanent-->
                        <div class="form-group">
                            <label for="inputMiddleName" class="col-lg-2 control-label">Middlename</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="middlename" id="inputMiddleName"
                                       placeholder="Middle Name"
                                       type="text">
                            </div>
                        </div><!--State-->
                        <div class="form-group">
                            <label for="inputLastName" class="col-lg-2 control-label">Lastname</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="lastname" id="inputLastName" placeholder="Last Name"
                                       type="text">
                            </div>
                        </div><!--City-->
                        <div class="form-group">
                            <label for="inputContactNumber" class="col-lg-2 control-label">Contact Number</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="contactnumber" id="inputContactNumber" placeholder="Contact Number"
                                       type="text">
                            </div>
                        </div><!--Country-->
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="email" id="inputEmail" placeholder="Email"
                                       type="email">
                            </div>
                        </div><!--Zip code-->
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Nominee Info</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputUser" class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="username" id="inputUser" placeholder="Username"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="password" id="inputPassword" placeholder="Password"
                                       type="password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Upload Images</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputUser" class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="username" id="inputUser" placeholder="Username"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="password" id="inputPassword" placeholder="Password"
                                       type="password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-2 submit">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
<!--<form class="form-horizontal" action="login.php" method="post">-->
<!--    <fieldset>-->
<!--        <legend>Login</legend>-->
<!--<!--        <form name="UserProcessForm" action="userProcess.php" method="post">-->
<!--            <div class="row">-->
<!--                <div class="col-md-4"></div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="panel-group" style="margin: 8px">-->
<!--                        <div class="panel panel-default">-->
<!--                            <div class="panel-heading">-->
<!--                                <h2 class="panel-title">-->
<!--                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><strong>..Details..</strong></a>-->
<!--                                </h2>-->
<!--                            </div>-->
<!--                            <div id ="collapse1" class="panel-collapse collapse in">-->
<!--                                <div class="panel-body">-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="first_name">First Name</label>-->
<!--                                            <input type="text" class="form-control" id="first_name" name="first_name">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="middle_name">Middle Name</label>-->
<!--                                            <input type="text" class="form-control" id="middle_name" name="middle_name">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="last_name">Last Name</label>-->
<!--                                            <input type="text" class="form-control" id="last_name" name="last_name">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="gender">Gender</label>-->
<!--                                            <input type="text" class="form-control" id="gender" name="gender">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="date_of_birth">Date of Birth</label>-->
<!--                                            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="contact_no">Contact No.</label>-->
<!--                                            <input type="text" class="form-control" id="contact_no" name="contact_no">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="e_mail">E mail</label>-->
<!--                                            <input type="text" class="form-control" id="e_mail" name="e_mail">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class ="panel-group" style="margin: 8px">-->
<!--                        <div class="panel panel-default">-->
<!--                            <div class="panel-heading">-->
<!--                                <h2 class="panel-title">-->
<!--                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><strong>..Address..</strong></a>-->
<!--                                </h2>-->
<!--                            </div>-->
<!--                            <div id ="collapse2" class="panel-collapse collapse in">-->
<!--                                <div class="panel-body">-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="address">Address</label>-->
<!--                                            <input type="text" class="form-control" id="address" name="address">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="type">Address Type</label>-->
<!--                                            <input type="text" class="form-control" id="type" name="type" placeholder="Present OR Permanent">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="state">State</label>-->
<!--                                            <input type="text" class="form-control" id="state" name="state">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="city">City</label>-->
<!--                                            <input type="text" class="form-control" id="city" name="city">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="country">Country</label>-->
<!--                                            <input type="text" class="form-control" id="country" name="country">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="zip_code">Zip code</label>-->
<!--                                            <input type="text" class="form-control" id="zip_code" name="zip_code">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class ="panel-group" style="margin: 8px">-->
<!--                        <div class="panel panel-default">-->
<!--                            <div class="panel-heading">-->
<!--                                <h2 class="panel-title">-->
<!--                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><strong>..Nominee Information..</strong></a>-->
<!--                                </h2>-->
<!--                            </div>-->
<!--                            <div id ="collapse3" class="panel-collapse collapse in">-->
<!--                                <div class="panel-body">-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="full_name">Full Name</label>-->
<!--                                            <input type="text" class="form-control" id="full_name" name="full_name">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="occupation">Occupation</label>-->
<!--                                            <input type="text" class="form-control" id="occupation" name="occupation">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="relationship">Relation</label>-->
<!--                                            <input type="text" class="form-control" id="relationship" name="relationship">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="n_gender">Gender</label>-->
<!--                                            <input type="text" class="form-control" id="n_gender" name="n_gender">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="n_date_of_birth">Date of Birth</label>-->
<!--                                            <input type="text" class="form-control" id="n_date_of_birth" name="n_date_of_birth">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="present_address">Present Address</label>-->
<!--                                            <input type="text" class="form-control" id="present_address" name="present_address">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="permanent_address">Permanent Address</label>-->
<!--                                            <input type="text" class="form-control" id="permanent_address" name="permanent_address">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="office_address">Office Address</label>-->
<!--                                            <input type="text" class="form-control" id="office_address" name="office_address">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class ="panel-group" style="margin: 8px">-->
<!--                        <div class="panel panel-default">-->
<!--                            <div class="panel-heading">-->
<!--                                <h2 class="panel-title">-->
<!--                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><strong>..Image..</strong></a>-->
<!--                                </h2>-->
<!--                            </div>-->
<!--                            <div id ="collapse4" class="panel-collapse collapse in">-->
<!--                                <div class="panel-body">-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="u_image">Your Image</label>-->
<!--                                            <input type="file" class="form-control-file" id="u_image" name="u_image">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="row" style="margin:5px">-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="n_image">Nominee Image</label>-->
<!--                                            <input type="file" class="form-control-file" id="n_image" name="n_image">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4"></div>-->
<!---->
<!--            </div>-->
<!--            <br/>-->
<!--            <div class="row">-->
<!--                <div class="col-md-4"></div>-->
<!--                <div class="col-md-4"></div>-->
<!--                <div class="col-md-4">-->
<!--                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit"/>-->
<!--                </div>-->
<!--            </div>-->

<!--    </fieldset>-->
<!--</form>-->
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
</body>
</html>



