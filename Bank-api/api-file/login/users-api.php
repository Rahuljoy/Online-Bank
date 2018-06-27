<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and api-classes files
include_once '../../configuration/Database.php';
include_once '../../api-classes/UserInformation.php';

// instantiate database and user information object
$database = new Database();
$db = $database->getConnection();

// initialize object
$userInformation = new UserInformation($db);

// query userInformation
$stmt = $userInformation->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // userInformation array
    $userInformation_arr=array();
        $userInformation_arr["users records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['user name'] to
        // just $user name only
        extract($row);

        $userInformation_item=array(
            "user id" => $user_id,
            "user name" => $user_name,
            "user password" => $user_password,
        );

        array_push($userInformation_arr["users records"], $userInformation_item);
    }

    echo json_encode($userInformation_arr);
}

else{
    echo json_encode(
        array("message" => "No user found.")
    );
}

