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
                <li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        Admin <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin.php">Home</a></li>
                        <li><a href="account-approve.php">Account Approve</a></li>
                        <li><a href="#">Card Management</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>User password</th>
        <th>User Contact</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $result = DB::query('SELECT * FROM bank_user_temps', array());

    for ($i = 0; $i < sizeof($result); $i++) {
        echo '<tr> <td>';
        $userIdForPrint = $result[$i]['user_id'];
        print_r($userIdForPrint);
        echo '</td>
            <td>';
        print_r($result[$i]['user_name']);
        echo '</td>
            <td>';
        print_r($result[$i]['user_password']);
        echo '</td>
            <td>';
        $informationResult = DB::query('SELECT contact_no FROM user_information_temps WHERE user_id= :user_id', array('user_id' => $userIdForPrint));
        if ($informationResult == null) {
            print_r("none");
        } else {
            print_r($informationResult[0]['contact_no']);
        }
        echo '</td>
            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View</button></a>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>';
    }
    ?>

    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Applied User Information</h4>
            </div>
            <div class="modal-body" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>Image :</b>
                            </li>
                            <li class="list-group-item">
                                <b>First Name :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Middle Name :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Last Name :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Address :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Gender :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Date Of Birth :</b>
                            </li>
                            <li class="list-group-item">
                            <b>Email :</b>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nominee information</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>Image :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Full Name :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Office Address :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Present Address :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Permanent Address :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Gender :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Occupation :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Relation :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Date Of Birth :</b>
                            </li>
                            <li class="list-group-item">
                                <b>Email :</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success">Approve</button>
                <button type="button" class="btn btn-warning">Reject</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
