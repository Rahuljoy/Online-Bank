<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and api classes files
include_once '../../configuration/Database.php';
//include_once '../../api-classes/UserInformation.php';

// instantiate database and user information object
$database = new Database();
$db = $database->getConnection();

// initialize object
//$userInformation = new UserInformation($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

$username = $data->user_name;
$userpassword = $data->user_password;

// query to select
$query = "SELECT user_id ,user_active FROM bank_users WHERE  user_name = ? &&  user_password = ?";

// prepare query
$stmt = $db->prepare($query);

// bind values
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $userpassword);

// execute query
$stmt->execute();

// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// read the details of user to be edited
//$userInformation->login();

// create array
$userInformation_arr = array(
    "user_id" =>  $row['user_id'],
    "user_active" => $row['user_active']

);

// make it json format
print_r(json_encode($userInformation_arr));