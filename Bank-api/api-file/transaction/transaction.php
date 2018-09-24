<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../configuration/Database.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

make

$mobile_no = $data->mobile_no;
// set product property values
$account_name = $data->account_name;
$transaction_amount = $data->transaction_amount;


$query = "UPDATE bank_users SET user_password = :user_password WHERE user_name = :user_name";

// prepare query statement
$stmt = $db->prepare($query);

// sanitize
$user_password=htmlspecialchars(strip_tags($user_password));
$user_name=htmlspecialchars(strip_tags($user_name));

// bind new values
$stmt->bindParam(':user_password', $user_password);
$stmt->bindParam(':user_name', $user_name);

$stmt->execute();

print_r(json_encode($userInformation_item));


