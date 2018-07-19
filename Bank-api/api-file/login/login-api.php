<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and api classes files
include_once '../../configuration/Database.php';
include_once '../../api-classes/UserInformation.php';

// instantiate database and user information object
$database = new Database();
$db = $database->getConnection();

// initialize object
$userInformation = new UserInformation($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// read the details of user to be edited
$userInformation->login();

// create array
$userInformation_arr = array(
    "user id" =>  $userInformation->user_id,
    "user active" => $userInformation->user_active

);

// make it json format
print_r(json_encode($userInformation_arr));