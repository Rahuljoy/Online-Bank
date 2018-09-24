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

$contact_no = $data->contact_no;
// set product property values
$transaction_type = $data->transaction_type;
$account_name = $data->account_name;

$query="INSERT INTO beneficiaries SET user_id=:user_id , contact_no = :contact_no , transaction_type = :transaction_type , account_name = :account_name ";
$stmt = $db->prepare( $query );

$user_id=htmlspecialchars(strip_tags($user_id));
$contact_no=htmlspecialchars(strip_tags($contact_no));
$transaction_type=htmlspecialchars(strip_tags($transaction_type));
$account_name=htmlspecialchars(strip_tags($account_name));

// bind new values
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':contact_no', $contact_no);
$stmt->bindParam(':transaction_type', $transaction_type);
$stmt->bindParam(':account_name', $account_name);

$stmt->execute();

$selectidquery = "SELECT user_id FROM user_informations WHERE  contact_no = :contact_no";

$stmt = $db->prepare($selectidquery);
$stmt->bindParam(':contact_no', $contact_no);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$userInformation_arr = array(
    "user_id" =>$row['user_id']
);


print_r(json_encode($userInformation_arr));
