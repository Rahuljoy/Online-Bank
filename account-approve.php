<?php
include( 'classes/DB.php' );
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
        <th>User password</th>
        <th>User Contact</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

	<?php
	//$userIdForPrint = 0;
	$result         = DB::query( 'SELECT * FROM bank_user_temps', array() );

	for ( $i = 0; $i < sizeof( $result ); $i ++ ) {
		echo '<tr> <td>';
		$userIdForPrint = $result[ $i ]['user_id'];
		print_r( $userIdForPrint );
		echo '</td>
            <td>';
		print_r( $result[ $i ]['user_name'] );
		echo '</td>
            <td>';
		print_r( $result[ $i ]['user_password'] );
		echo '</td>
            <td>';
		$informationResult = DB::query( 'SELECT contact_no FROM user_information_temps WHERE user_id= :user_id', array( 'user_id' => $userIdForPrint ) );
		if ( $informationResult == null ) {
			print_r( "none" );
		} else {
			print_r( $informationResult[0]['contact_no'] );
		}
		echo '</td>
            <td><button id="showModal" type="button" class="btn btn-info" data-toggle="modal" data-target="#';
		echo $result[ $i ]['user_id'];
		echo '">
            View
            </button>
           
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        
        
        <!-- Modal -->
<div class="modal fade" id="';
		echo $result[ $i ]['user_id'];
		echo '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Applied User Information</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information</h3>
                    </div>
                    <div class="panel-body">';


		$informationForPrint        = DB::query( 'SELECT * FROM user_information_temps WHERE user_id= :user_id', array( 'user_id' => $userIdForPrint ) );
		$addressInformationForPrint = DB::query( 'SELECT * FROM address_temps WHERE user_id= :user_id', array( 'user_id' => $userIdForPrint ) );
		$nomineeInformationForPrint = DB::query( 'SELECT * FROM nominee_temps WHERE user_id= :user_id', array( 'user_id' => $userIdForPrint ) );
		echo '<ul class="list-group">
                                                    <img src="';
		echo ($informationForPrint[0]['picture_path']);
		echo '" height="100" width="100"/>';
//print_r($informationForPrint[0]["image"]);
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>First Name : </b>';
		print_r( $informationForPrint[0]["first_name"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Middle Name : </b>';
		print_r( $informationForPrint[0]["middle_name"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Last Name : </b>';
		print_r( $informationForPrint[0]["last_name"] );
		echo '          
                            </li>
                            <li class="list-group-item">
                                <b>Present Address :</b>';
		print_r( $addressInformationForPrint[0]["present_address"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Permanent Address :</b>';
		print_r( $addressInformationForPrint[0]["permanent_address"] . ','  );
        print_r( $addressInformationForPrint[0]["state"] . ',' );
        print_r( $addressInformationForPrint[0]["city"] . ',' );
        print_r( $addressInformationForPrint[0]["country"] . ',' . 'zip code:' );
        print_r( $addressInformationForPrint[0]["zip_code"] . '.' );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Gender :</b>';
		print_r( $informationForPrint[0]["gender"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Date Of Birth :</b>';
		print_r( $informationForPrint[0]["date_of_birth"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Email :</b>';
		print_r( $informationForPrint[0]["e_mail"] );
		echo '
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nominee information</h3>
                    </div>
                    <div class="panel-body">';
		echo '
                       <ul class="list-group">
                                                    <img src="';
		echo ($nomineeInformationForPrint[0]['picture_path']);
		echo '" height="100" width="100"/>';
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Full Name :</b>';
		print_r( $nomineeInformationForPrint[0]["full_name"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Office Address :</b>';
		print_r( $nomineeInformationForPrint[0]["office_address"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Present Address :</b>';
		print_r( $nomineeInformationForPrint[0]["present_address"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Permanent Address :</b>';
		print_r( $nomineeInformationForPrint[0]["permanent_address"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Gender :</b>';
		print_r( $nomineeInformationForPrint[0]["gender"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Occupation :</b>';
		print_r( $nomineeInformationForPrint[0]["occupation"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Relation :</b>';
		print_r( $nomineeInformationForPrint[0]["relationship"] );
		echo '
                            </li>
                            <li class="list-group-item">
                                <b>Date Of Birth :</b>';
		print_r( $nomineeInformationForPrint[0]["date_of_birth"] );
		echo '
                            </li>
                        </ul>
                    </div>
                </div>
            </div>';
		echo '

            <div class="modal-footer">
                <button type="submit" name="submit" onclick="submit(';
		echo $userIdForPrint;
		echo ')" class="btn btn-success">Approve</button>
                <button type="reset" class="btn btn-warning">Reject</button>
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
<script type="text/javascript">
    function submit(id) {
        $.ajax({
            type: 'POST',
            url: 'approve.php',
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
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
