<?php
include('classes/DB.php');

date_default_timezone_set("Asia/Dhaka");

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dateofbirth = $_POST['dateofbirth'];
    $contactnumber = $_POST['contactnumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $addressType = $_POST['addressType'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $fullname = $_POST['fullname'];
    $occupation = $_POST['occupation'];
    $relation = $_POST['relation'];
    $officeaddress = $_POST['officeaddress'];
    $presentaddress = $_POST['presentaddress'];
    $permanentaddress = $_POST['permanentaddress'];
    $n_gender = $_POST['n_gender'];
    $n_dateofbirth = $_POST['n_dateofbirth'];
    $uimage = addslashes(file_get_contents($_FILES['uimage']['tmp_name']));
    $nimage = addslashes(file_get_contents($_FILES['nimage']['tmp_name']));
    $username = $_POST['username'];
    $password = $_POST['password'];
    $time = date("y-m-d h:m:s");


    // Insert user
    DB::query(' INSERT INTO bank_user_temps  VALUES (\'\', :user_name, :user_password, :type_id,
        :user_create_date, :user_active)', array(':user_name' => $username, ':user_password' => $password,
        ':type_id' => 2, ':user_create_date' => $time, ':user_active' => false));
    // user last insert id
    $lastId = DB::query('SELECT user_id FROM bank_user_temps WHERE user_name=:username', array(':username' => $username))[0]['user_id'];
     //echo $lastId;

    //  Insert nominee
    DB::query(' INSERT INTO nominee_temps VALUES (\'\',:full_name,:occupation,:relationship,:office_address,:present_address,:permanent_address,:gender,:date_of_birth,:image,:user_id)',array(':full_name' => $fullname,':occupation' => $occupation,':relationship' => $relation,':office_address' => $officeaddress,':present_address' => $presentaddress,':permanent_address' => $permanentaddress,':gender' => $n_gender,':date_of_birth'=>$n_dateofbirth,':image'=>$nimage,':user_id' => $lastId));
    //nominee last insert id
    $nomineeLastId = DB::query('SELECT nominee_id FROM nominee_temps WHERE user_id=:user_id',array(':user_id'=>$lastId))[0]['nominee_id'];
   // echo $nomineeLastId;

    //address insert
    DB::query(' INSERT INTO address_temps VALUES (\'\',:address,:type,:state,:city,:country,:zip_code,:user_id)',array(':address' => $address,':type' => $addressType,':state' => $state,':city' => $city,':country' => $country,':zip_code' => $zipcode,':user_id' => $lastId));
    //address last insert id
    $addressLastId = DB::query('SELECT address_id FROM address_temps WHERE user_id=:user_id',array(':user_id'=>$lastId))[0]['address_id'];
    //echo $addressLastId;

    //Insert user information
    DB::query(' INSERT INTO user_information_temps VALUES (\'\',:first_name,:middle_name,:last_name,:e_mail,:contact_no,:gender,:date_of_birth,:image,:user_id,:nominee_id,:address_id)',array(':first_name' => $firstname,':middle_name' => $middlename,':last_name' => $lastname,':e_mail' => $email,':contact_no' => $contactnumber,':gender' => $gender,':date_of_birth' => $dateofbirth,':image' => $uimage,':user_id' => $lastId,':nominee_id' => $nomineeLastId,':address_id' => $addressLastId));


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
    <link rel="stylesheet" href="assets/datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
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
                <li><a href="service.php">Services</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
            </ul>
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
                            <label for="inputFirstName" class="col-lg-2 control-label">First name</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="firstname" id="inputFirstName"
                                       placeholder="First Name"
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
                            <div class='col-lg-10'>
                                <input name="dateofbirth" type='date' class="form-control"
                                       placeholder="Input Date of Birth"/>

                            </div>
                        </div><!--Date of Birth-->
                        <div class="form-group">
                            <label for="inputContactNumber" class="col-lg-2 control-label">Contact Number</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="contactnumber" id="inputContactNumber"
                                       placeholder="Contact Number"
                                       type="text" required>
                            </div>
                        </div><!--Contact Number-->
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="email" id="inputEmail" placeholder="Email"
                                       type="email" required>
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
                                <input class="form-control" name="occupation" id="inputOccupation"
                                       placeholder="Occupation"
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
                                <input class="form-control" name="officeaddress" id="inputOfficeAddress"
                                       placeholder="Office address"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPresentAddress" class="col-lg-2 control-label">Present address</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="presentaddress" id="inputPresentAddress"
                                       placeholder="Present address"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPermanentAddress" class="col-lg-2 control-label">Permanent address</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="permanentaddress" id="inputPermanentAddress"
                                       placeholder="Permanent address"
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
                            <div class='col-lg-10'>
                                <input name="n_dateofbirth" type='date' class="form-control"
                                       placeholder="Input Date of Birth"/>
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
                                <input class="form-control-file" name="uimage" id="inputImage" placeholder="Your Image"
                                       type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNImage" class="col-lg-2 control-label">Nominee Image</label>
                            <div class="col-lg-10">
                                <input class="form-control-file" name="nimage" id="inputNImage"
                                       placeholder="Nominee Image"
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
                                       type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="password" id="inputPassword" placeholder="Password"
                                       type="password" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="col-lg-10 col-lg-offset-2 ">
                <button type="reset" class="btn btn-default" name="cancel">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>
        <br/>
    </fieldset>
</form>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>



