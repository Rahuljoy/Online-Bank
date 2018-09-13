<?php
include( 'classes/DB.php' );
include( 'classes/Mail.php' );
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
$n_present_state = $nomineeInformationForPrint[0]["present_state"];
$n_present_city = $nomineeInformationForPrint[0]["present_city"];
$n_present_country = $nomineeInformationForPrint[0]["present_country"];
$n_present_zip_code = $nomineeInformationForPrint[0]["present_zip_code"];
$permanent_address = $nomineeInformationForPrint[0]["permanent_address"];
$n_permanent_state = $nomineeInformationForPrint[0]["permanent_state"];
$n_permanent_city = $nomineeInformationForPrint[0]["permanent_city"];
$n_permanent_country = $nomineeInformationForPrint[0]["permanent_country"];
$n_permanent_zip_code = $nomineeInformationForPrint[0]["permanent_zip_code"];
$nominee_gender = $nomineeInformationForPrint[0]["gender"];
$nominee_date_of_birth = $nomineeInformationForPrint[0]["date_of_birth"];
$nominee_nid = $nomineeInformationForPrint[0]["nid"];
//Nominee image data collect
$nfiletmp=$_FILES["nimage"]["tmp_name"];

$nfilename = $nomineeInformationForPrint[0]["image"];
$nfiletype = $nomineeInformationForPrint[0]["picture_type"];
//
$nfilepath= $nomineeInformationForPrint[0]["picture_path"];
//
//move_uploaded_file($nfiletmp,$nfilepath);


$addressInformationForPrint = DB::query( 'SELECT * FROM address_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );

$u_present_address = $addressInformationForPrint[0]["present_address"];
$present_state = $addressInformationForPrint[0]["present_state"];
$present_city = $addressInformationForPrint[0]["present_city"];
$present_country = $addressInformationForPrint[0]["present_country"];
$present_zip_code = $addressInformationForPrint[0]["present_zip_code"];
$u_permanent_address = $addressInformationForPrint[0]["permanent_address"];
$permanent_state = $addressInformationForPrint[0]["permanent_state"];
$permanent_city = $addressInformationForPrint[0]["permanent_city"];
$permanent_country = $addressInformationForPrint[0]["permanent_country"];
$permanent_zip_code = $addressInformationForPrint[0]["permanent_zip_code"];


$informationForPrint = DB::query( 'SELECT * FROM user_information_temps WHERE user_id= :user_id', array( 'user_id' => $userId ) );

$first_name = $informationForPrint[0]["first_name"];
$middle_name = $informationForPrint[0]["middle_name"];
$last_name = $informationForPrint[0]["last_name"];
$e_mail = $informationForPrint[0]["e_mail"];
$contact_no = $informationForPrint[0]["contact_no"];
$user_gender = $informationForPrint[0]["gender"];
$user_date_of_birth = $informationForPrint[0]["date_of_birth"];
$user_nid = $informationForPrint[0]["nid"];
//user image data collect
$ufiletmp=$_FILES["uimage"]["tmp_name"];

$ufilename = $informationForPrint[0]["image"];
$ufiletype = $informationForPrint[0]["picture_type"];
//
$ufilepath= $informationForPrint[0]["picture_path"];
//
//move_uploaded_file($ufiletmp,$ufilepath);

$user_account_no = rand();
//$account_no = $accountForPrint[0]["account_no"];
//echo $account_no;


// Insert user
DB::query(' INSERT INTO bank_users  VALUES (\'\', :user_name, :user_password, :type_id,
        :user_create_date, :user_active,:user_account_no)', array(':user_name' => $user_name, ':user_password' => $user_password,
    ':type_id' => 2, ':user_create_date' => $time, ':user_active' => true, ':user_account_no' => $user_account_no));
// user last insert id
$lastId = DB::query('SELECT user_id FROM bank_users WHERE user_name=:user_name', array(':user_name' => $user_name))[0]['user_id'];
//echo $lastId;

//  Insert nominee
DB::query(' INSERT INTO nominees VALUES (\'\',:full_name,:occupation,:relationship,:office_address,:present_address,:present_city,:present_state,:present_country,:present_zip_code,:permanent_address,:permanent_city,:permanent_state,:permanent_country,:permanent_zip_code,:gender,:date_of_birth,:image,:picture_type, :picture_path,:user_id,:nid)',array(':full_name' => $full_name,':occupation' => $occupation,':relationship' => $relationship,':office_address' => $office_address,':present_address' => $present_address,':present_city' => $n_present_city,':present_state' => $n_present_state,':present_country' => $n_present_country,':present_zip_code' => $n_present_zip_code,':permanent_address' => $permanent_address,':permanent_city' => $n_permanent_city,':permanent_state' => $n_permanent_state,':permanent_country' => $n_permanent_country,':permanent_zip_code' => $n_permanent_zip_code,':gender' => $nominee_gender,':date_of_birth'=>$nominee_date_of_birth,':image' => $nfilename, ':picture_type' => $nfiletype,
    ':picture_path' => $nfilepath,':user_id' => $lastId,':nid' => $nominee_nid));
//nominee last insert id
$nomineeLastId = DB::query('SELECT nominee_id FROM nominees WHERE user_id=:user_id',array(':user_id'=>$lastId))[0]['nominee_id'];
// echo $nomineeLastId;

//address insert
DB::query(' INSERT INTO addresses VALUES  (\'\',:present_address,:present_state,:present_city,:present_country,:present_zip_code,:permanent_address,:permanent_state,:permanent_city,:permanent_country,:permanent_zip_code,:user_id)',array(':present_address' => $u_present_address,':present_state' => $present_state,':present_city' => $present_city,':present_country' => $present_country,':present_zip_code' => $present_zip_code,':permanent_address' => $u_permanent_address,':permanent_state' => $permanent_state,':permanent_city' => $permanent_city,':permanent_country' => $permanent_country,':permanent_zip_code' => $permanent_zip_code,':user_id' => $lastId));
//address last insert id
$addressLastId = DB::query('SELECT address_id FROM addresses WHERE user_id=:user_id',array(':user_id'=>$lastId))[0]['address_id'];
//echo $addressLastId;

//Insert user information
DB::query(' INSERT INTO user_informations VALUES (\'\',:first_name,:middle_name,:last_name,:e_mail,:contact_no,:gender,:date_of_birth,:image,:picture_type, :picture_path,:user_id,:nominee_id,:address_id,:nid)',array(':first_name' => $first_name,':middle_name' => $middle_name,':last_name' => $last_name,':e_mail' => $e_mail,':contact_no' => $contact_no,':gender' => $user_gender,':date_of_birth' => $user_date_of_birth,':image' => $ufilename, ':picture_type' => $ufiletype,
    ':picture_path' => $ufilepath,':user_id' => $lastId,':nominee_id' => $nomineeLastId,':address_id' => $addressLastId,':nid' => $user_nid));


Mail::sendMail('Welcome to The Online Bank!', 'Your account has been created!'.'Account Name:'.$user_name.','.'Account Id:'.$lastId.','.'Account No:'.$user_account_no,$e_mail);

?>