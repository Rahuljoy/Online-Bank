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

$query = "SELECT user_name, user_password, type_id, user_create_date, user_active FROM bank_users WHERE user_id = ?";

// prepare query statement
$stmt = $db->prepare( $query );

// bind id of product to be updated
$stmt->bindParam(1, $user_id);

// execute query
$stmt->execute();

// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$userInformation_arr=array();
$userInformation_arr["user_record"]=array();

// set values to object properties
$userInformation_item = array(
    "user_name" => $user_name= $row['user_name'],
    "user_password" => $user_password = $row['user_password'],
    "type_id" => $type_id = $row['type_id'],
    "user_create_date" => $user_create_date= $row['user_create_date'],
    "user_active" => $user_active = $row['user_active']
);

array_push($userInformation_arr["user_record"], $userInformation_item);
// make it json format
print_r(json_encode($userInformation_arr));