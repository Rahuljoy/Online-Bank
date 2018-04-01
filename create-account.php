<?php
include('classes/DB.php');

date_default_timezone_set("Asia/Dhaka");

if (isset($_POST['submit'])) {
//    $firstname = $_POST['firstname'];
//    $middlename = $_POST['middlename'];
//    $lastname = $_POST['lastname'];
//    $gender = $_POST['gender'];
//    $dateofbirth = $_POST['dateofbirth'];
//    $contactnumber = $_POST['contactnumber'];
//    $email = $_POST['email'];
//    $address = $_POST['address'];
//    $addressType = $_POST['addressType'];
//    $state = $_POST['state'];
//    $city = $_POST['city'];
//    $country = $_POST['country'];
//    $zipcode = $_POST['zipcode'];
//    $fullname = $_POST['fullname'];
//    $occupation = $_POST['occupation'];
//    $relation = $_POST['relation'];
//    $officeaddress = $_POST['officeaddress'];
//    $presentaddress = $_POST['presentaddress'];
//    $permanentaddress = $_POST['permanentaddress'];
//    $n_gender = $_POST['n_gendre'];
//    $n_dateofbirth = $_POST['n_dateofbirth'];
//    $image = $_POST['image'];
//    $nimage = $_POST['nimage'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $time = date("Y-m-d H:i:s");

    DB::query(' INSERT INTO bank_user_temps  VALUES (\'\', :user_name, :user_password, :type_id,
        :user_create_date, :user_active)', array ( ':user_name' => $username, ':user_password' => $password,
        ':type_id' => 2, ':user_create_date' => $time, ':user_active' => false));
//    DB::query("INSERT INTO `bank_user_temps`(`user_name`, `user_password`,
//`type_id`, `user_create_date`, `user_active`) VALUES ('$username','$password', 2, '$time', false)");
//    echo $user_id;
//        if (strlen($username) >= 3 && strlen($username) <= 32) {
//
//            if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
//
//                if (strlen($password) >= 6 && strlen($password) <= 60) {
//
//                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//
//                        if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email' => $email))) {
//
//                            DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'0\', \'\')', array(':username' => $username, ':password' => password_hash($password, PASSWORD_BCRYPT), ':email' => $email));
//                            Mail::sendMail('Welcome to The Circle!', 'Your account has been created!', $email);
//                            header('Location: http://localhost/the_circle/login.php');
//                        } else {
//                            echo 'Email in use!';
//                        }
//                    } else {
//                        echo 'Invalid email!';
//                    }
//                } else {
//                    echo 'Invalid password!';
//                }
//            } else {
//                echo 'Invalid username';
//            }
//        } else {
//            echo 'Invalid username';
//        }
//
//    } else {
//        echo 'User already exists!';
//    }
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
<form class="form-horizontal" action="create-account.php" method="post" enctype="multipart/form-data">
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
                            <label for="inputFirstName" class="col-lg-2 control-label">Firs tname</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="firstname" id="inputFirstName" placeholder="First Name"
                                       type="text">
                            </div>
                        </div><!--First Name-->
                        <div class="form-group">
                            <label for="inputMiddleName" class="col-lg-2 control-label">Middle name</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="middlename" id="inputMiddleName"
                                       placeholder="Middle Name"
                                       type="text">
                            </div>
                        </div><!--Middle Name-->
                        <div class="form-group">
                            <label for="inputLastName" class="col-lg-2 control-label">Last name</label>
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
                            <label for="addressType" class="col-lg-2 control-label">Address type</label>
                            <div class="col-lg-10">
                                <select name="addressType" class="form-control" id="select">
                                    <option>Present</option>
                                    <option>Permanent</option>
                                </select>
                            </div>
                        </div><!--Present or Permanent-->
                        <div class="form-group">
                            <label for="inputState" class="col-lg-2 control-label">State</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="state" id="inputState"
                                       placeholder="State"
                                       type="text">
                            </div>
                        </div><!--State-->
                        <div class="form-group">
                            <label for="inputCity" class="col-lg-2 control-label">City</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="city" id="inputCity" placeholder="City"
                                       type="text">
                            </div>
                        </div><!--City-->
                        <div class="form-group">
                            <label for="inputCountry" class="col-lg-2 control-label">Country</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="country" id="inputCountry" placeholder="Country"
                                       type="text">
                            </div>
                        </div><!--Country-->
                        <div class="form-group">
                            <label for="inputZipCode" class="col-lg-2 control-label">Zip code</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="zipcode" id="inputZipCode" placeholder="Zip code"
                                       type="text">
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
                            <label for="inputFullName" class="col-lg-2 control-label">Full name</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="fullname" id="inputFullName" placeholder="Full name"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputOccupation" class="col-lg-2 control-label">Occupation</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="Occupation" id="inputOccupation" placeholder="Occupation"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRelation" class="col-lg-2 control-label">Relation</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="relation" id="inputRelation" placeholder="Relation"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputOfficeAddress" class="col-lg-2 control-label">Office address</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="officeaddress" id="inputOfficeAddress" placeholder="Office address"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPresentAddress" class="col-lg-2 control-label">Present address</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="presentaddress" id="inputPresentAddress" placeholder="Present address"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPermanentAddress" class="col-lg-2 control-label">Permanent address</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="permanentaddress" id="inputPermanentAddress" placeholder="Permanent address"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="n_gender" class="col-lg-2 control-label">Gender</label>
                            <div class="col-lg-10">
                                <select name="n_gender" class="form-control" id="select">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Not want to mention</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="n_dateOfBirth" class="col-lg-2 control-label">Date of Birth</label>
                            <div class='input-group date col-lg-10' id='datetimepicker2'>
                                <input name="n_dateofbirth" type='text' class="form-control" placeholder="Input Date of Birth" />
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
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
                            <label for="inputImage" class="col-lg-2 control-label">Your Image</label>
                            <div class="col-lg-10">
                                <input class="form-control-file" name="image" id="inputImage" placeholder="Your Image"
                                       type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNImage" class="col-lg-2 control-label">Nominee Image</label>
                            <div class="col-lg-10">
                                <input class="form-control-file" name="nimage" id="inputNImage" placeholder="Nominee Image"
                                       type="file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">provide User & Password</a>
                    </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputUserName" class="col-lg-2 control-label">User name</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="username" id="inputUserName" placeholder="User name"
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
            <br/>
            <div class="col-lg-10 col-lg-offset-2 submit">
                <button type="reset" class="btn btn-default" name="cancel">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>
        <br/>
    </fieldset>
</form>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
    });
</script>
</body>
</html>



