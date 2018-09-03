<?php
// required headers
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

// set ID property of product to be edited

$user_name = $data->user_name;
// set product property values
$user_password = $data->user_password;

// update the product
$updatequery = "UPDATE bank_users SET user_password = :user_password WHERE user_name = :user_name";

// prepare query statement
$stmt = $db->prepare($updatequery);

// sanitize
$user_password=htmlspecialchars(strip_tags($user_password));
$user_name=htmlspecialchars(strip_tags($user_name));

// bind new values
$stmt->bindParam(':user_password', $user_password);
$stmt->bindParam(':user_name', $user_name);

if($stmt->execute()){

    echo '"message": "Password was updated."';
}else{

    echo '"message": "Password updated error."';

}

$selectidquery = "SELECT user_id FROM bank_users WHERE  user_name = :user_name";

$stmt = $db->prepare($selectidquery);
$stmt->bindParam(':user_name', $user_name);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$userInformation_arr = array(
    "user_id" =>$row['user_id']
);

print_r($userInformation_arr);

$user_id = $userInformation_arr ["user_id"];

$selectquery = "SELECT e_mail FROM user_informations WHERE  user_id = :user_id";

$stmt = $db->prepare($selectquery);

// bind id of product to be updated
$stmt->bindParam(':user_id', $user_id);

// execute query
$stmt->execute();
// get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $userInformation_item = array(
        "e_mail" => $e_mail = $row['e_mail']
    );
    print_r(json_encode($userInformation_item));



