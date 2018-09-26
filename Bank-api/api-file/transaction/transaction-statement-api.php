<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and api classes files
include_once '../../configuration/Database.php';

// instantiate database and user information object
$database = new Database();
$db = $database->getConnection();

// get posted data
$data = json_decode(file_get_contents("php://input"));

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

$to_date = $data-> transactions_date;
$from_date = $data-> transactions_date;

$lasttransactionuseraccountnoquery="SELECT user_account_no FROM bank_users WHERE  user_id= ?";
$stmt = $db->prepare($lasttransactionuseraccountnoquery);
$stmt->bindParam(1, $user_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$from_account = $row['user_account_no'];

$selectstatementquery="SELECT transactions_amount,transaction_type FROM transactions WHERE  from_account= :from_account";
$stmt = $db->prepare($selectstatementquery);
$stmt->bindParam(':from_account', $from_account);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$transactions_amount = $row['transactions_amount'];
$transaction_type  = $row['transaction_type '];

$userInformation_item = array(
    "from_account" => $from_account,
    "transactions_amount" => $transactions_amount,
    "transaction_type" => $transaction_type,

);
print_r(json_encode($userInformation_item));