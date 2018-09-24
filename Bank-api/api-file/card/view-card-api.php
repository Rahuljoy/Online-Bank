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

$cardinformationquery = "SELECT card_type,full_name,balance,expair_date FROM cards WHERE user_id = ?";
// prepare query statement
$stmt = $db->prepare( $cardinformationquery );
// bind id of product to be updated
$stmt->bindParam(1, $user_id);
// execute query
$stmt->execute();
// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$cardInformation_item=array(
    "card_type" =>$row['card_type'],
    "full_name" =>$row['full_name'],
    "balance" =>$row['balance'],
    "expair_date" =>$row['expair_date']
);

print_r(json_encode($cardInformation_item));