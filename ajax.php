<?php
include( 'classes/DB.php' );
date_default_timezone_set( "Asia/Dhaka" );

$userId = $_POST['user_id'];
$time           = date( "y-m-d h:m:s" );

DB::query(' INSERT INTO bank_users  VALUES (\'\', :user_name, :user_password, :type_id,
        :user_create_date, :user_active)', array(':user_name' => "user_name" , ':user_password' => $userId,
    ':type_id' => 2, ':user_create_date' => $time, ':user_active' => true));


?>