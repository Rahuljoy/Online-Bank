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

$usercardquery = "SELECT card_no,expair_date,full_name,c_v_s_code FROM cards WHERE user_id=?";
// prepare query statement
$stmt = $db->prepare( $usercardquery );
// bind id of product to be updated
$stmt->bindParam(1, $user_id);
// execute query
$stmt->execute();
// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$usercardInformation_arr = array(
    "card_no" =>$row['card_no'],
    "expair_date" =>$row['expair_date'],
    "full_name" =>$row['full_name'],
    "c_v_s_code" =>$row['c_v_s_code'],
);

$card_no = $usercardInformation_arr ["card_no"];
//print_r($card_no);
$expair_date = $usercardInformation_arr ["expair_date"];
//print_r($expair_date);
$full_name = $usercardInformation_arr ["full_name"];
//print_r($full_name);
$c_v_s_code = $usercardInformation_arr ["c_v_s_code"];
//print_r($c_v_s_code );

$card_no = $data->card_no;
//print_r($card_no);
$expair_date = $data->expair_date;
//print_r($expair_date);
$full_name = $data->full_name;
//print_r($full_name);
$c_v_s_code = $data->c_v_s_code;
//print_r($c_v_s_code);

// query to select
$query = "SELECT card_type , balance , card_pin FROM cards WHERE  card_no = :card_no && expair_date = :expair_date && full_name = :full_name && c_v_s_code = :c_v_s_code";

// prepare query
$stmt = $db->prepare($query);

// bind values
$stmt->bindParam(':card_no', $card_no);
$stmt->bindParam(':expair_date', $expair_date);
$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':c_v_s_code', $c_v_s_code);

// execute query
$stmt->execute();

//// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// create array
$cardInformation_arr = array(
    "card_type" =>  $row['card_type'],
    "balance" => $row['balance'],
    "card_pin" => $row['card_pin'],
);
// make it json format
print_r(json_encode($cardInformation_arr));