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

// set product property values
$userInformation->user_name = $data->user_name;
$userInformation->user_password = $data->user_password;

// create the product
if($userInformation->create()){
    echo '{';
    echo '"message": "user was matched."';
    echo '}';
}

// if unable to create the product, tell the user
else{
    echo '{';
    echo '"message": "Unable to user & password."';
    echo '}';
}
