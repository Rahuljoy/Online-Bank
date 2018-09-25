<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../configuration/Database.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

$contactnoquery = "SELECT contact_no FROM beneficiaries WHERE user_id = ?";
// prepare query statement
$stmt = $db->prepare( $contactnoquery);
// bind id of product to be updated
$stmt->bindParam(1, $user_id);
// execute query
$stmt->execute();
// get retrieved row
$num = $stmt->rowCount();
if($num>0) {

    // userInformation array
//    $userContactInformation_arr = array();
//    $userContactInformation_arr["contact_no"]=array() ;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
//
        $userContactInformation_item = array(
//            "contact_no" => $contact_no,
            "contact_no" =>$row['contact_no']
        );
        $contact_no = $userContactInformation_item ["contact_no"];

        $userInformation_all=array(
            "contact_no" => $contact_no,

        );

        print_r(json_encode($userInformation_all));
    }
}



