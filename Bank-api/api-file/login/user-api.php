<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and api classes files
include_once '../../configuration/Database.php';
include_once '../../api-classes/UserInformation.php';

// instantiate database and user information object
$database = new Database();
$db = $database->getConnection();

// initialize object
$userInformation = new UserInformation($db);

// set ID property of user to be edited
$userInformation->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

// read the details of user to be edited
$userInformation->readOne();

// create array
$userInformation_arr = array(
    "user id" =>  $userInformation->user_id,
    "user name" => $userInformation->user_name,
    "user password" => $userInformation->user_password

);

// make it json format
print_r(json_encode($userInformation_arr));
