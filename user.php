<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATOM_BANK</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
</head>
<body background="Image/bank_background.PNG">

<div class="container" style="width:1880px">
    <div class="row">
        <div class="col-md-4">
            <img src="Image/bank.PNG" alt="bank" class="img-circle">
        </div>
        <div class="col-md-8">
            <h1>ATOM_BANK<br/><small>A_Online_Banking_System</small></h1>
        </div>
    </div>
    <br/>
    <div class="row">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="navbar-header">
                            <ul class="nav navbar-nav">
                                <li class="active"><a class="navbar-brand" href="/D_bank/bank_home.html">ATOM_BANK</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="user.php">Create Account</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="/D_bank/help.html">Help</a></li>

                                </ul>
                            </div>
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-3">
                                <ul class="nav navbar-nav">
                                    <li><a href="/D_bank/faq.html">FAQ</a></li>
                                    <li><a href="/D_bank/contact_us.html">Contact Us</a></li>
                                    <li><a href="/D_bank/login.php">Log In</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="row">
            <div style="text-align: center">
                <h3>Please Provide Your Information Below</h3>
            </div>
        </div>
        <br/>
        <div class="row">
            <form name="UserProcessForm" action="userProcess.php" method="post">
                <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel-group" style="margin: 8px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><strong>..Details..</strong></a>
                                </h2>
                            </div>
                            <div id ="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <input type="text" class="form-control" id="gender" name="gender">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="contact_no">Contact No.</label>
                                            <input type="text" class="form-control" id="contact_no" name="contact_no">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="e_mail">E mail</label>
                                            <input type="text" class="form-control" id="e_mail" name="e_mail">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class ="panel-group" style="margin: 8px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><strong>..Address..</strong></a>
                                </h2>
                            </div>
                            <div id ="collapse2" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="type">Address Type</label>
                                            <input type="text" class="form-control" id="type" name="type" placeholder="Present OR Permanent">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="zip_code">Zip code</label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class ="panel-group" style="margin: 8px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><strong>..Nominee Information..</strong></a>
                                </h2>
                            </div>
                            <div id ="collapse3" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" class="form-control" id="occupation" name="occupation">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="relationship">Relation</label>
                                            <input type="text" class="form-control" id="relationship" name="relationship">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="n_gender">Gender</label>
                                            <input type="text" class="form-control" id="n_gender" name="n_gender">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="n_date_of_birth">Date of Birth</label>
                                            <input type="text" class="form-control" id="n_date_of_birth" name="n_date_of_birth">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="present_address">Present Address</label>
                                            <input type="text" class="form-control" id="present_address" name="present_address">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="permanent_address">Permanent Address</label>
                                            <input type="text" class="form-control" id="permanent_address" name="permanent_address">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="office_address">Office Address</label>
                                            <input type="text" class="form-control" id="office_address" name="office_address">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class ="panel-group" style="margin: 8px">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><strong>..Image..</strong></a>
                                </h2>
                            </div>
                            <div id ="collapse4" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="u_image">Your Image</label>
                                            <input type="file" class="form-control-file" id="u_image" name="u_image">
                                        </div>
                                    </div>
                                    <div class="row" style="margin:5px">
                                        <div class="form-group">
                                            <label for="n_image">Nominee Image</label>
                                            <input type="file" class="form-control-file" id="n_image" name="n_image">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>

                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
