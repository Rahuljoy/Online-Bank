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

//beneficiaty contact no check
$chckbeneficiatycontactnoquery = "SELECT contact_no FROM beneficiaries WHERE  user_id= ?";
$stmt=$db->prepare($chckbeneficiatycontactnoquery);
$stmt->bindParam(1, $user_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$beneficiaty_contact_no=$row['contact_no'];


$to_mobile_no = $data-> contact_no;
$transactions_amount = $data-> transactions_amount;

$user_provide_password = $data-> user_password;

//if ($to_mobile_no=$beneficiaty_contact_no) {

//from mobile no
    $usermobilenoquery = "SELECT contact_no FROM user_informations WHERE  user_id= ?";
    $stmt = $db->prepare($usermobilenoquery);
    $stmt->bindParam(1, $user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $from_mobile_no = $row['contact_no'];

//from account no
    $fromaccountnoquery = "SELECT user_account_no FROM bank_users WHERE  user_id= ?";
    $stmt = $db->prepare($fromaccountnoquery);
    $stmt->bindParam(1, $user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $from_account = $row['user_account_no'];

//to user id
    $touseridquery = "SELECT user_id FROM user_informations WHERE  contact_no= ?";
    $stmt = $db->prepare($touseridquery);
    $stmt->bindParam(1, $to_mobile_no);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $to_user_id = $row['user_id'];

//to account no
    $toaccountnoquery = "SELECT user_account_no FROM bank_users WHERE  user_id= ?";
    $stmt = $db->prepare($toaccountnoquery);
    $stmt->bindParam(1, $to_user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $to_account = $row['user_account_no'];

//from amount
    $fromamountquery = "SELECT balance FROM cards WHERE  user_id= ?";
    $stmt = $db->prepare($fromamountquery);
    $stmt->bindParam(1, $user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $from_account_balance = $row['balance'];

//to amount
    $toamountquery = "SELECT balance FROM cards WHERE  user_id= ?";
    $stmt = $db->prepare($toamountquery);
    $stmt->bindParam(1, $to_user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $to_account_balance = $row['balance'];

//transaction Calculation
    if ($from_account_balance >= $transactions_amount) {
        $newUser_balance = $from_account_balance - $transactions_amount;
        $newReceiver_balance = $to_account_balance + $transactions_amount;
    }
//insert transaction temp
    $transactiontempquery = "INSERT INTO transaction_temps SET from_account=:from_account,to_account=:to_account,to_mobile_no=:to_mobile_no,from_mobile_no=:from_mobile_no,transactions_amount=:transactions_amount,transaction_status='Pending',transaction_type='A/C Transfer'";
    $stmt = $db->prepare($transactiontempquery);

    $from_account = htmlspecialchars(strip_tags($from_account));
    $to_account = htmlspecialchars(strip_tags($to_account));
    $to_mobile_no = htmlspecialchars(strip_tags($to_mobile_no));
    $from_mobile_no = htmlspecialchars(strip_tags($from_mobile_no));
    $transactions_amount = htmlspecialchars(strip_tags($transactions_amount));

    $stmt->bindParam(':from_account', $from_account);
    $stmt->bindParam(':to_account', $to_account);
    $stmt->bindParam(':to_mobile_no', $to_mobile_no);
    $stmt->bindParam(':from_mobile_no', $from_mobile_no);
    $stmt->bindParam(':transactions_amount', $transactions_amount);

    $stmt->execute();

    $selecttransactionquery = "SELECT transactions_id FROM transaction_temps WHERE  from_mobile_no = :from_mobile_no";
    $stmt = $db->prepare($selecttransactionquery);
    $stmt->bindParam(':from_mobile_no', $from_mobile_no);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $transaction_temp_id = $row['transactions_id'];

//password
    $userpasswordquery = "SELECT user_password FROM bank_users WHERE  user_id= ?";
    $stmt = $db->prepare($userpasswordquery);
    $stmt->bindParam(1, $user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_password = $row['user_password'];

    if ($user_provide_password == $user_password) {
//transaction
        $transactionquery = "INSERT INTO transactions SET from_account=:from_account,to_account=:to_account,to_mobile_no=:to_mobile_no,from_mobile_no=:from_mobile_no,transactions_amount=:transactions_amount,transaction_status='Successfully',transaction_type='A/C Transfer'";
        $stmt = $db->prepare($transactionquery);

        $from_account = htmlspecialchars(strip_tags($from_account));
        $to_account = htmlspecialchars(strip_tags($to_account));
        $to_mobile_no = htmlspecialchars(strip_tags($to_mobile_no));
        $from_mobile_no = htmlspecialchars(strip_tags($from_mobile_no));
        $transactions_amount = htmlspecialchars(strip_tags($transactions_amount));

        $stmt->bindParam(':from_account', $from_account);
        $stmt->bindParam(':to_account', $to_account);
        $stmt->bindParam(':to_mobile_no', $to_mobile_no);
        $stmt->bindParam(':from_mobile_no', $from_mobile_no);
        $stmt->bindParam(':transactions_amount', $transactions_amount);
        $stmt->execute();

    } else {
        echo "Error";
    }
//update from balance query
    $selectfromaccountquery = "SELECT user_id FROM user_informations WHERE  contact_no = :from_mobile_no";
    $stmt = $db->prepare($selectfromaccountquery);
    $stmt->bindParam(':from_mobile_no', $from_mobile_no);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $row['user_id'];

    $frombalanceupdatequery = "UPDATE cards SET balance = :newUser_balance WHERE user_id= :user_id";
    $stmt = $db->prepare($frombalanceupdatequery);

    $newUser_balance = htmlspecialchars(strip_tags($newUser_balance));
    $user_id = htmlspecialchars(strip_tags($user_id));

    $stmt->bindParam(':newUser_balance', $newUser_balance);
    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();

//update to balance query

    $selecttoaccountquery = "SELECT user_id FROM user_informations WHERE  contact_no =?";
    $stmt = $db->prepare($selecttoaccountquery);
    $stmt->bindParam(1, $to_mobile_no);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $to_user_id = $row['user_id'];

    $tobalanceupdatequery = "UPDATE cards SET balance = :newReceiver_balance WHERE user_id= :to_user_id";
    $stmt = $db->prepare($tobalanceupdatequery);

    $newReceiver_balance = htmlspecialchars(strip_tags($newReceiver_balance));
    $to_user_id = htmlspecialchars(strip_tags($to_user_id));

    $stmt->bindParam(':newReceiver_balance', $newReceiver_balance);
    $stmt->bindParam(':to_user_id', $to_user_id);
    $stmt->execute();

//insert balance table query
    $insertbalancetablequery = "INSERT INTO balances SET balance=:newUser_balance,last_transaction_balance=:transactions_amount,user_id=:user_id";
    $stmt = $db->prepare($insertbalancetablequery);

    $newUser_balance = htmlspecialchars(strip_tags($newUser_balance));
    $transactions_amount = htmlspecialchars(strip_tags($transactions_amount));
    $user_id = htmlspecialchars(strip_tags($user_id));

    $stmt->bindParam(':newUser_balance', $newUser_balance);
    $stmt->bindParam(':transactions_amount', $transactions_amount);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
//
    $selecttransactionstatusquery = "SELECT transaction_status FROM transactions WHERE  to_mobile_no = :to_mobile_no";
//
    $stmt = $db->prepare($selecttransactionstatusquery);
    $stmt->bindParam(':to_mobile_no', $to_mobile_no);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $transactionstatusInformation_arr = array(
//    "transaction_status " =>$row['transaction_status ']
        "transaction_status" => $transaction_status = $row['transaction_status']
    );

//else{
    print_r(json_encode($transactionstatusInformation_arr));
//}
//echo ();
