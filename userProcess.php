<?php

include('DB_Connection/DBConnection.php');
include ('Class/User_info.php');
include ('Class/Address.php');
include ('Class/Nominee.php');
session_start();
//user details
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name=$_POST['last_name'];
$gender=$_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$e_mail = $_POST['e_mail'];
$contact_no = $_POST['contact_no'];
//$image=$_POST['image'];

$user_info = new user_info($first_name,$middle_name,$last_name,$e_mail, $contact_no, $gender,$date_of_birth);
var_dump($user_info);
$user_info_id = null;



//address
$address=$_POST['address'];
$type=$_POST['type'];
$state=$_POST['state'];
$city=$_POST['city'];
$country=$_POST['country'];
$zip_code=$_POST['zip_code'];

$addresses =new address($address,$type,$state,$city,$country,$zip_code);
var_dump($addresses);
$address_id = null;



//nominee
$full_name=$_POST['full_name'];
$occupation=$_POST['occupation'];
$relationship=$_POST['relationship'];
$office_address=$_POST['office_address'];
$present_address=$_POST['present_address'];
$permanent_address=$_POST['permanent_address'];
$n_gender=$_POST['n_gender'];
$n_date_of_birth=$_POST['n_date_of_birth'];

//$nominee = new nominee($full_name,$occupation,$relationship,$office_address,$present_address,$permanent_address,$n_gender,$n_date_of_birth);
var_dump($nominee);
$nominee_id=null;





// Creating DBConnection object
$DBConnect = new DBConnection();

// Creating connection to database
$DBConnect->createConnection();

// Getting connection variable
$connection = $DBConnect->getConnection();

// Getting result by SQL Query

//user_info
//$result = $DBConnect->saveInformation(" INSERT INTO `user_info_temp`(`first_name`,`middle_name`,`last_name`,`e_mail`,`contact_no`,`gender`,`date_of_birth`) VALUES ('$first_name','$middle_name','$last_name','$e_mail','$contact_no','$gender','$date_of_birth')", $connection);

//address
//$result = $DBConnect->saveInformation("INSERT INTO `address_temp`(`address`,`type`,`state`,`city`,`country`,`zip_code`) VALUES ('$address','$type','$state','$city','$country','$zip_code')",$connection);

//nominee
$result = $DBConnect->saveInformation("INSERT INTO `nominee_temp`(`full_name`,`occupation`,`relationship`,`office_address`,`present_address`,`permanent_address`,`gender`,`date_of_birth`) VALUES ('$full_name','$occupation','$relationship','$office_address','$present_address','$permanent_address','$n_gender','$n_date_of_birth')",$connection);
echo "Nominee info " . $result;
//// Printing Result
//if ($result->num_rows > 0) {
//    // output data of each row
//    while ($row = $result->fetch_assoc()) {
//        echo "id: " . $row["user_id"] . " - Name: " . $row["user_name"] . " - password: " . $row["user_password"] . "<br>";
//    }
//} else {
//    echo "0 results";
//}
$DBConnect->closeConnection();
?>

