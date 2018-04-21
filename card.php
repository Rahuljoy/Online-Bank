<?php
include('classes/DB.php');
date_default_timezone_set( "Asia/Dhaka" );
//$cookie_name = 'user_id';
//if (!isset($_COOKIE[$cookie_name])) {
//    echo "Cookie named '" . $cookie_name . "' is not set!";
//} else {
//    $user_id = $_COOKIE[$cookie_name];
//    echo "$user_id";
//}
$userId =$_GET['id'];
echo $userId . '<br/>';
if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $number = $_POST['number'];
    $name = $_POST['name'];
    $expiry = $_POST['expiry'];
    $pin = $_POST['pin'];
    $balance = $_POST['balance'];
    $cvc = $_POST['cvc'];
    $time = date( "y-m-d h:m:s" );


    //insert card
    DB::query(' INSERT INTO cards  VALUES (\'\', :card_type, :card_no, :balance, :card_pin,:expair_date,:c_v_s_code,:create_date,:user_id,:full_name)', array(':card_type' => $type, ':card_no' => $number,
        ':balance' => $balance, ':card_pin' =>$pin , ':expair_date'=>$expiry,':c_v_s_code'=>$cvc, ':create_date' => $time, ':user_id'=>$userId,':full_name'=>$name));
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
                        <li><a href="card-create.php">Card Management</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="card-wrapper"></div>
    <br/>
    <div class="form-container active">
        <form class="form-horizontal" action="card.php?id=<?php echo $userId; ?>" method="post">
            <fieldset class="card-form">
                <div class="form-group">
                    <label for="type" class="col-lg-2 control-label">Card Type</label>
                    <div class="col-lg-10">
                        <select name="type" class="form-control" id="select">
                            <option>Select One</option>
                            <option style="color: indigo">Visa => (4.....)</option>
                            <option style="color: royalblue">MasterCard => (5{1,2,3,4,5}.....)</option>
                            <option style="color: lightskyblue">Discover => (6011.....)</option>
                            <option style="color: darkslategray">American Express => (37.....)</option>
                            <option style="color: darkorange">JCB => (35.....)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCardNo" class="col-lg-2 control-label">Card number</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="number" id="inputCardNo" placeholder="Card number"
                               type="tel" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFullName" class="col-lg-2 control-label">Full Name</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="name" id="inputFullName" placeholder="Full Name"
                               type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputExpiryDate" class="col-lg-2 control-label">Expiry Date</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="expiry" id="inputExpiryDate" placeholder="MM/YY"
                               type="tel" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCardPin" class="col-lg-2 control-label">Card Pin</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="pin" id="inputCardPin" placeholder="Card pin"
                               type="number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputBalance" class="col-lg-2 control-label">Balance</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="balance" id="inputBalance" placeholder="Balance"
                               type="number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCVC" class="col-lg-2 control-label">CVC</label>
                    <div class="col-lg-10">
                        <input class="form-control" name="cvc" id="inputCVC" placeholder="CVC"
                               type="number" required>
                    </div>
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" name="submit" class="btn btn-success">Create</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <a href="card-create.php">
                        <button type="button" name="button" class="btn btn-danger">Back</button>
                    </a>
                </div>
            </fieldset>
        </form>
    </div>

</div>

<script src="assets/JavaScript/card.js"></script>
<script>
    new Card({
        form: document.querySelector('form'),
        container: '.card-wrapper'
    });
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>