<?php
include( 'classes/DB.php' );
date_default_timezone_set( "Asia/Dhaka" );

$userId = $_POST['user_id'];
$time           = date( "y-m-d h:m:s" );


$userForPrint = DB::query( 'SELECT * FROM bank_user_temps WHERE user_id= :user_id', array('user_id' => $userId ) );
$informationForPrint = DB::query( 'SELECT * FROM user_information_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );
$addressInformationForPrint = DB::query( 'SELECT * FROM address_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );
$nomineeInformationForPrint = DB::query( 'SELECT * FROM nominee_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );

//$first_name = $informationForPrint[0]["first_name"];
//$first_name = $informationForPrint[0]["first_name"];
//$first_name = $informationForPrint[0]["first_name"];
//$first_name = $informationForPrint[0]["first_name"];
//$first_name = $informationForPrint[0]["first_name"];
//$first_name = $informationForPrint[0]["first_name"];
//$first_name = $informationForPrint[0]["first_name"];
//$first_name = $informationForPrint[0]["first_name"];

?>