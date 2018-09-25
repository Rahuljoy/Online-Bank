<?php
// required headers
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

$contact_no = $data-> contact_no;
$transactionAmount = $data-> transaction_amount;


$accountnoquery="SELECT user_account_no FROM bank_users WHERE  user_id= ?";
$stmt = $db->prepare( $accountnoquery);
// bind id of product to be updated
$stmt->bindParam(1, $user_id);
// execute query
$stmt->execute();
// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userAccountnoInformation_item=array(
    "transaction_domination" =>$row['user_account_no']
);
$transaction_domination  = $userAccountnoInformation_item["transaction_domination"];
$transactiondominationquery = "INSERT INTO transaction_temps SET user_id=:user_id , transactions_domination=:transaction_domination";
$stmt = $db->prepare( $transactiondominationquery );
$user_id=htmlspecialchars(strip_tags($user_id));
$transaction_domination =htmlspecialchars(strip_tags($transaction_domination ));

$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':transaction_domination', $transaction_domination);
$stmt->execute();

$receveraccountnamequary="SELECT account_name FROM beneficiaries WHERE  contact_no= ?";
$stmt = $db->prepare( $receveraccountnamequary);
$stmt->bindParam(1, $contact_no);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userAccountnameInformation_item=array(
"account_name" =>$row['account_name ']
);
$account_name  = $userAccountnameInformation_item["account_name"];
$accountnamequery = "INSERT INTO transaction_temps SET user_id=:user_id , account_name=:account_name";
$stmt = $db->prepare( $accountnamequery );
$user_id=htmlspecialchars(strip_tags($user_id));
$transaction_domination =htmlspecialchars(strip_tags($accountnamequery ));

$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':account_name', $account_name);
$stmt->execute();
//$receiveraccountidquary = "SELECT user_id FROM bank_users WHERE  user_name=:account_name";
//$stmt = $db->prepare( $receiveraccountidquary);
//$stmt->bindParam(":account_name", $account_name);
//$stmt->execute();
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$receiverAccountidInformation_item=array(
//    "receiver_account_id" =>$row['account_name ']
//);
////$user_id = $data-> user_id;
//
//$userbalancequery="SELECT balance FROM cards WHERE  user_id= ?";
//
//$stmt = $db->prepare( $userbalancequery );
//// bind id of product to be updated
//$stmt->bindParam(1, $user_id);
//// execute query
//$stmt->execute();
//// get retrieved row
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$userBalanceInformation_item=array(
//    "sender balance" =>$row['balance']
//);
//$user_balance = $userBalanceInformation_item["sender balance"];
//
//
//$contactnoidquery="SELECT user_id FROM user_informations WHERE  contact_no = ? ";
//$stmt = $db->prepare( $contactnoidquery );
//// bind id of product to be updated
//$stmt->bindParam(1, $contact_no);
//// execute query
//$stmt->execute();
//// get retrieved row
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$contactnoidInformation_item=array(
//    "Receiver_user_id" =>$row['user_id']
//);
//$user_id = $contactnoidInformation_item["Receiver_user_id"];
//
//
//$contactNoAccountNamequery = "SELECT account_name FROM beneficiaries WHERE  contact_no = ? ";
//$stmt = $db->prepare($contactNoAccountNamequery);
//$stmt->bindParam(1, $contact_no);
//$stmt->execute();
//// get retrieved row
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$contactnoaccountnameInformation_item=array(
//    "account_name" =>$row['account_name']
//);
//$account_name = $contactnoaccountnameInformation_item["account_name"];
//
//
//$selectreceiveraccountNoquery = "SELECT user_account_no FROM bank_users WHERE  user_id = :user_id";
//$stmt = $db->prepare($selectreceiveraccountNoquery);
//$stmt->bindParam(':user_id', $user_id);
//$stmt->execute();
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$receiveraccountnoInformation_item = array(
//    "receiver_account_no" =>$row['user_account_no']
//);
//$receiver_account_no = $receiveraccountnoInformation_item["receiver_account_no"];
//
//
//$selectquery = "SELECT balance FROM cards WHERE  user_id = :user_id";
//
//$stmt = $db->prepare($selectquery);
//$stmt->bindParam(':user_id', $user_id);
//$stmt->execute();
//// get retrieved row
//$row = $stmt->fetch(PDO::FETCH_ASSOC);
//$balanceInformation_item = array(
//    "receiver_balance" =>$row['balance']
//);
//$receiver_balance = $balanceInformation_item["receiver_balance"];
//
//$total_balance = ($user_balance+$receiver_balance);
//$totalbalanceInformation_item = array(
//    "total_balance" =>['total_balance']
//);
//
//if ($user_balance>=$transactionAmount){
//    $newUser_balance=$user_balance-$transactionAmount;
//    $newReceiver_balance=$receiver_balance+$transactionAmount;
//}
//$userInformation_all=array(
//    "user_account_no" => $user_account_no,
////    "sender balance" => $user_balance,
////    "Receiver_user_id" => $user_id,
////    "account_name" => $account_name,
////    "Receiver_account_no" => $receiver_account_no,
////    "receiver_balance" => $receiver_balance,
////    "total_balance" => $total_balance,
////    "newUserBalance" =>$newUser_balance,
////    "newReceiverBalance" => $newReceiver_balance,
////
//);
//
//$user_account_no =$data->user_account_no;
//$receiver_account_no=$data->receiver_account_no;
//$account_name=$data->account_name;
//$transactionAmount = $data-> transaction_amount;
//$user_id =$data->user_id;
//
//$query="INSERT INTO transaction_temps SET transactions_domination=:user_account_no , fund_transfer = :receiver_account_no , transactions_amount= :transaction_amount , account_name = :account_name , user_id=:user_id";
//$stmt = $db->prepare( $query );
//
//$user_account_no=htmlspecialchars(strip_tags($user_account_no));
//$receiver_account_no=htmlspecialchars(strip_tags($receiver_account_no));
//$transactionAmount=htmlspecialchars(strip_tags($transactionAmount));
//$account_name=htmlspecialchars(strip_tags($account_name));
//$user_id=htmlspecialchars(strip_tags($user_id));
//
//
//$stmt->bindParam(':user_account_no', $user_account_no);
//$stmt->bindParam(':receiver_account_no', $receiver_account_no);
//$stmt->bindParam(':transactionAmount', $transactionAmount);
//$stmt->bindParam(':account_name', $account_name);
//$stmt->bindParam(':user_id', $user_id);
//
//$stmt->execute();
//
//print_r(json_encode($user_account_no));
