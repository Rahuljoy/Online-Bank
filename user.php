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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
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
                    <a class="dropdown-toggle" href="#"  data-toggle="dropdown"  aria-expanded="false">
                        User <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="user.php">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Activity</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="devsite-landing-row-group">
    <div class="devsite-landing-row-iteam">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="assets/images/user/user.jpg" alt="bank_banner" style="width:100%;">
                </div>

                <div class="item">
                    <img src="assets/images/user/user0.jpg" alt="banner" style="width: 100%">
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="src-only"></span>
                </a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div style="text-align: center;">
            <figure>
                <img src="assets/images/user/user.gif" height="450px" width="950px">
            </figure>
        </div>
    </div>
    <br/>
    <div class="row">
        <div style="text-align: center;">
            <i><h2 style="color: #204d74">"For Existing Users"</h2></i>
            <p1>Here we can provide you all of your Online Bank Statement.Here you can access all of your activity .</p1>
        </div>
    </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
