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
                        <li><a href="user-profile.php">Profile</a></li>
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
            Activities
        </h7>
    </div>
</div>
<br/>
<div class="row">
    <div style="text-align: center;">
        <i><h2 style="color: #204d74">"Here you can See your all kind of activities"</h2></i>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#transaction" data-toggle="tab" aria-expanded="true">Transaction</a></li>
            <li class=""><a href="#statement" data-toggle="tab" aria-expanded="false">Statement</a></li>
        </ul>
        <br/>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="transaction">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div style="text-align: center;">
                        <div class="col-md-10">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Transaction ID</th>
                                    <th>Transaction Type</th>
                                    <th>Web Url</th>
                                    <th>Shop Name</th>
                                    <th>ATM Place</th>
                                    <th>Transaction Amount</th>
                                    <th>Transaction Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="statement">
                <p>See all of your transaction statement.</p>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
