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
    $userIdForPrint = 0;
    $result = DB::query('SELECT * FROM bank_users', array());

    for ($i = 0; $i < sizeof($result); $i++) {
        echo '<tr> <td>';
        $userIdForPrint = $result[$i]['user_id'];
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
            <td><button id="showModal" type="button" class="btn btn-info" data-toggle="modal" data-target="#';
        echo $result[$i]['user_id'];
        echo '">
           Generate Card
            </button>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        
        
        <!-- Modal -->
<div class="modal fade" id="';
        echo $result[$i]['user_id'];
        echo '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Card For Applied User</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Card Create</h3>
                    </div>
                    <div class="panel-body">';
        echo '
        <form class="form-horizontal" action="card-create.php" method="post">
  <fieldset class="card-form">
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        <div class="checkbox">
          <label>
            <input type="checkbox"> Checkbox
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <br>
        <select multiple="" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
  </fieldset>
</form>';

        echo '
<br/>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Generate</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>';
    }
    ?>
    </tbody>
</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
