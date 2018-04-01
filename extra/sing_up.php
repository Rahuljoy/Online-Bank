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
                <h3>Please sing up</h3>
            </div>
        </div>
        <br/>
        <div class="row">
            <form name="singUpForm" action="singUpProcess.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4" align="center">
                        <label for="card_ no">Account No</label>
                        <input type="text" class="form-control" id="card_ no" name="card_ no" placeholder="card_no">
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4" align="center">
                        <div class="row" style="margin:5px">
                            <div class="form-group">
                                <label for="name">Account name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="user_name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4" align="center">
                        <div class="row" style="margin:5px">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-10">

                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary" name="submit" id="sing_up" value="Sing Up"/>
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