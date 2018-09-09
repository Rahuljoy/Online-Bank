<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// include database and api classes files
include_once '../../configuration/Database.php';

// instantiate database and user information object
$database = new Database();
$db = $database->getConnection();

// set ID property of user to be edited
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

$userquery = "SELECT user_name,user_active FROM bank_users WHERE user_id = ?";
// prepare query statement
$stmt = $db->prepare( $userquery );
// bind id of product to be updated
$stmt->bindParam(1, $user_id);
// execute query
$stmt->execute();
// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//$userInformation_arr=array();
//$userInformation_arr["users_records"]=array();

$userInformation_arr=array(
    "user_name" => $row['user_name'],
    "user_active" => $row['user_active'],

);
$user_name = $userInformation_arr ["user_name"];
$user_active = $userInformation_arr ["user_active"];

//print_r(json_encode($userInformation_arr));

$userinformationquery = "SELECT contact_no,image,picture_type,picture_path FROM user_informations WHERE user_id = ?";
// prepare query statement
$stmt = $db->prepare( $userinformationquery );
// bind id of product to be updated
$stmt->bindParam(1, $user_id);
// execute query
$stmt->execute();
// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$userInformation_item=array(
    "contact_no" =>$row['contact_no'],
    "image" =>$row['image'],
    "picture_type" =>$row['picture_type'],
    "picture_path" =>$row['picture_path']
);
$contact_no = $userInformation_item ["contact_no"];
$image = $userInformation_item ["image"];
$picture_type = $userInformation_item ["picture_type"];
$picture_path = $userInformation_item ["picture_path"];

//$userInformation_store=array();
//$userInformation_store["users_records"]=array();

$userInformation_all=array(
    "user_name" => $user_name,
    "user_active" => $user_active,
    "contact_no" => $contact_no,
    "image" => $image,
    "picture_type" => $picture_type,
    "picture_path" => $picture_path,

);

//array_push($userInformation_arr["users_records"], $userInformation_item);

print_r(json_encode($userInformation_all));