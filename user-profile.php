<?php
include('classes/DB.php');
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
<nav class="navbar navbar-default navbar-fixed-top">
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
                <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        $cookie_name = 'user_id';
                        $user_id = $_COOKIE[$cookie_name];
                        //echo $user_id;
                        $userForPrint = DB::query('SELECT * FROM bank_users WHERE user_id= :user_id', array('user_id' => $user_id));
                        print_r($userForPrint[0]['user_name']);
                        echo '<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="user.php">Home</a></li>
                        <li><a href="user-profile.php">visit Profile</a></li>
                        <li><a href="user-activity.php">Activity</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br/>
<div class="row">
    <div style="text-align: center;">
        <h7>
            profile
        </h7>
    </div>
</div>
<br/>
<div class="row">
    <div style="text-align: center;">
        <i><h2 style="color: #204d74">"Profile"</h2></i>
        <p1>Here all of information about you.Here you can access all of your activity.</p1>
    </div>
</div>
<br/>
<div class="container">
    <div class="container-fluid">
        <div class="well well-lg">
            <div class="row">
                <div class="col-md-7 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Your Profile</h4></div>
                        <div class="panel-body">
                            <div class="box box-info">
                                <div class="box-body">';

                        $addressForPrint = DB::query('SELECT * FROM addresses WHERE user_id= :user_id', array('user_id' => $user_id));
                        $nomineeForPrint = DB::query('SELECT * FROM nominees WHERE user_id= :user_id', array('user_id' => $user_id));
                        $informationForPrint = DB::query('SELECT * FROM user_informations WHERE user_id= :user_id', array('user_id' => $user_id));
                        $cardForPrint = DB::query('SELECT * FROM cards WHERE user_id= :user_id', array('user_id' => $user_id));
                        echo '
                                    <div class="col-sm-6">
                                        <div  align="center"> <img alt="User Pic" src="';
                        echo($informationForPrint[0]['picture_path']);
                        echo '" id="profile-image1" class="img-circle img-responsive">';
                        echo '
                                            <!--Upload Image Js And Css-->
                                        </div>
                                        <br>
                                        <!-- /input-group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 style="color:#00b1b1;">';
                        print_r($informationForPrint[0]['first_name'] . ' ');
                        print_r($informationForPrint[0]['middle_name'] . ' ');
                        print_r($informationForPrint[0]['last_name'] . ' ');
                        echo '</h4></span>
                                        <span></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr style="margin:5px 0 5px 0;">
                                    <div class="col-sm-5 col-xs-6 tital " >User Name:</div>
                                    <div class="col-sm-7 col-xs-6 ">';
                        print_r($userForPrint[0]['user_name']);
                        echo '</div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Gender:</div>
                                    <div class="col-sm-7">';
                        print_r($informationForPrint[0]['gender']);
                        echo '</div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Address:</div>
                                    <div class="col-sm-7">';
                        print_r($addressForPrint[0]['present_address'] . ',');
                        print_r($addressForPrint[0]['present_state'] . ',');
                        print_r($addressForPrint[0]['present_city']);
                        echo '</div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div>
                                    <div class="col-sm-7">';
                        print_r($informationForPrint[0]['date_of_birth']);
                        echo '</div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Country:</div>
                                    <div class="col-sm-7">';
                        print_r($addressForPrint[0]['present_country']);
                        echo '</div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >NID Number:</div>
                                    <div class="col-sm-7">';
                        print_r($informationForPrint[0]['nid']);
                        echo '</div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Nominee Name:</div>
                                    <div class="col-sm-7">';
                        print_r($nomineeForPrint[0]['full_name']);
                        echo '</div>
<div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Card Number:</div>
                                    <div class="col-sm-7">';
                        print_r($cardForPrint[0]['card_no']);
                        echo '
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                        ?>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
