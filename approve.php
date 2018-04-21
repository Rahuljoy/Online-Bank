<?php
include( 'classes/DB.php' );
date_default_timezone_set( "Asia/Dhaka" );

$userId = $_POST['user_id'];
$time = date( "y-m-d h:m:s" );


$userForPrint = DB::query( 'SELECT * FROM bank_user_temps WHERE user_id= :user_id', array('user_id' => $userId ) );

$user_name = $userForPrint[0]["user_name"];
$user_password = $userForPrint[0]["user_password"];


$nomineeInformationForPrint = DB::query( 'SELECT * FROM nominee_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );

$full_name = $nomineeInformationForPrint[0]["full_name"];
$occupation = $nomineeInformationForPrint[0]["occupation"];
$relationship = $nomineeInformationForPrint[0]["relationship"];
$office_address = $nomineeInformationForPrint[0]["office_address"];
$present_address = $nomineeInformationForPrint[0]["present_address"];
$permanent_address = $nomineeInformationForPrint[0]["permanent_address"];
$nominee_gender = $nomineeInformationForPrint[0]["gender"];
$nominee_date_of_birth = $nomineeInformationForPrint[0]["date_of_birth"];
//Nominee image data collect
$nfiletmp=$_FILES["nimage"]["tmp_name"];

$nfilename = $nomineeInformationForPrint[0]["image"];
$nfiletype = $nomineeInformationForPrint[0]["picture_type"];
//
$nfilepath= $nomineeInformationForPrint[0]["picture_path"];
//
//move_uploaded_file($nfiletmp,$nfilepath);


$addressInformationForPrint = DB::query( 'SELECT * FROM address_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );

$address = $addressInformationForPrint[0]["address"];
$type = $addressInformationForPrint[0]["type"];
$state = $addressInformationForPrint[0]["state"];
$city = $addressInformationForPrint[0]["city"];
$country = $addressInformationForPrint[0]["country"];
$zip_code = $addressInformationForPrint[0]["zip_code"];


$informationForPrint = DB::query( 'SELECT * FROM user_information_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );

$first_name = $informationForPrint[0]["first_name"];
$middle_name = $informationForPrint[0]["middle_name"];
$last_name = $informationForPrint[0]["last_name"];
$e_mail = $informationForPrint[0]["e_mail"];
$contact_no = $informationForPrint[0]["contact_no"];
$user_gender = $informationForPrint[0]["gender"];
$user_date_of_birth = $informationForPrint[0]["date_of_birth"];
//user image data collect
$ufiletmp=$_FILES["uimage"]["tmp_name"];

$ufilename = $informationForPrint[0]["image"];
$ufiletype = $informationForPrint[0]["picture_type"];
//
$ufilepath= $informationForPrint[0]["picture_path"];
//
//move_uploaded_file($ufiletmp,$ufilepath);

// Insert user
DB::query(' INSERT INTO bank_users  VALUES (\'\', :user_name, :user_password, :type_id,
        :user_create_date, :user_active)', array(':user_name' => $user_name, ':user_password' => $user_password,
    ':type_id' => 2, ':user_create_date' => $time, ':user_active' => true));
// user last insert id
$lastId = DB::query('SELECT user_id FROM bank_users WHERE user_name=:user_name', array(':user_name' => $user_name))[0]['user_id'];
//echo $lastId;

//  Insert nominee
DB::query(' INSERT INTO nominees VALUES (\'\',:full_name,:occupation,:relationship,:office_address,:present_address,:permanent_address,:gender,:date_of_birth,:image,:picture_type, :picture_path,:user_id)',array(':full_name' => $full_name,':occupation' => $occupation,':relationship' => $relationship,':office_address' => $office_address,':present_address' => $present_address,':permanent_address' => $permanent_address,':gender' => $nominee_gender,':date_of_birth'=>$nominee_date_of_birth,':image' => $nfilename, ':picture_type' => $nfiletype,
    ':picture_path' => $nfilepath,':user_id' => $lastId));
//nominee last insert id
$nomineeLastId = DB::query('SELECT nominee_id FROM nominees WHERE user_id=:user_id',array(':user_id'=>$lastId))[0]['nominee_id'];
// echo $nomineeLastId;

//address insert
DB::query(' INSERT INTO addresses VALUES (\'\',:address,:type,:state,:city,:country,:zip_code,:user_id)',array(':address' => $address,':type' => $type,':state' => $state,':city' => $city,':country' => $country,':zip_code' => $zip_code,':user_id' => $lastId));
//address last insert id
$addressLastId = DB::query('SELECT address_id FROM addresses WHERE user_id=:user_id',array(':user_id'=>$lastId))[0]['address_id'];
//echo $addressLastId;

//Insert user information
DB::query(' INSERT INTO user_informations VALUES (\'\',:first_name,:middle_name,:last_name,:e_mail,:contact_no,:gender,:date_of_birth,:image,:picture_type, :picture_path,:user_id,:nominee_id,:address_id)',array(':first_name' => $first_name,':middle_name' => $middle_name,':last_name' => $last_name,':e_mail' => $e_mail,':contact_no' => $contact_no,':gender' => $user_gender,':date_of_birth' => $user_date_of_birth,':image' => $ufilename, ':picture_type' => $ufiletype,
    ':picture_path' => $ufilepath,':user_id' => $lastId,':nominee_id' => $nomineeLastId,':address_id' => $addressLastId));

?>