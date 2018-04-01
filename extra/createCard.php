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
                                    <li><a href="/D_bank/user.php">Create Account</a></li>
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
                                    <li class="active"><a href="/D_bank/login.php">Log In<br/><small>Admin</small><small>(User Management)</small></a></li>
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
                <h2> Atom </h2>
                <h3>Based on Assurance</h3>
            </div>
        </div>
        <br/>
        <div class="row">
            <div style="text-align: center;">
                <h3>............ Create Card ..............</h3>
                <h2>Generate Card for User</h2>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <form name="cardProcessFrom" action="createCardProcess.php" method="post">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4" align="center">
                    <div class="row">
                        <label for="user_name">User Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name">
                    </div>
                    <div class="row">
                        <label for="card_pin">Account Pin</label>
                        <input type="text" class="form-control" id="card_pin" name="card_pin">
                    </div>
                    <div class="row">
                        <label for="c-v-c_code">Card Security Code</label>
                        <input type="text" class="form-control" id="c-v-c_code" name="c-v-c_code">
                    </div>
                    <div class="row">
                        <label for="balance">Card Balance</label>
                        <input type="text" class="form-control" id="balance" name="balance">
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-7">

                </div>
                <div class="col-md-5">
                    <input type="submit" class="btn btn-info" name="submit" id="generate" value="Generate"/>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="row" style="margin:5px">
                        <div class="form-group">
                            <label for="card_no">Account No</label>
                            <input type="text" class="form-control" id="card_no" name="card_no">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="Image/bank_card.png" alt="bank_card" class="img-responsive">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-10">

                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" name="submit" id="create_card" value="Create Card"/>
                </div>
            </div>
            <br/>

        </form>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>