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
                        <li><a href="card-create.php">Card Management</a></li>
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
        <th>User Email</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //$userIdForPrint = 0;
    $result = DB::query('SELECT * FROM bank_users', array());

    for ($i = 0; $i < sizeof($result); $i++) {
        echo '<tr> <td>';
        $userIdForPrint = $result[$i]['user_id'];
//        $cookie_name = "user_id";
//        $cookie_value = $userIdForPrint;
//        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        print_r($userIdForPrint);

        echo '</td>
            <td>';
        print_r($result[$i]['user_name']);
        echo '</td>
            <td>';
        $informationResult = DB::query('SELECT e_mail FROM user_informations WHERE user_id= :user_id', array('user_id' => $userIdForPrint));
        if ($informationResult == null) {
            print_r("none");
        } else {
            print_r($informationResult[0]['e_mail']);
        }
        echo '</td>
            <td>
            <a href="card.php?id=';
        print_r($userIdForPrint);
        echo'"><button type="button" class="btn btn-info">
           Generate
            </button> 
            </a>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
            ';

    }
    ?>
        </tbody>
</table>

<!--<a href="card.php?id="' . $userIdForPrint . '><button class="btn btn-info" onclick="submit('.$userIdForPrint.')">
    Generate
</button>
</a> -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script type="text/javascript">
    function submit(id) {
        $.ajax({
            type: 'POST',
            url: 'card.php',
            data: {
                user_id: id
            },
            success: function (response) {
            },
            error: function (response) {
            }
        });
        alert(id);
    }
</script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
