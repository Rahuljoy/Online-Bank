<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include('../../classes/DB.php');
include('../api-classes/UserInformation.php');

// instantiate database and UserInformation object
//$db = new DB();
$database = $this->pdo->connect();

// initialize object
$userInformation = new UserInformation($database);

// query products
$statement = $userInformation->read();
$number = $statement->rowCount();

// check if more than 0 record found
if($number>0){

    // products array
    $products_arr=array();
    $products_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );

        array_push($products_arr["records"], $product_item);
    }

    echo json_encode($products_arr);
}

else{
    echo json_encode(
        array("message" => "No products found.")
    );
}


//include ('../../classes/DB.php');
//header("Content-type: application/json");
//$request=$_SERVER['REQUEST_METHOD'];
//
//switch ($request){
//    case 'GET':
//        getDataForLoginUser();
//        break;
//
//    default:
//        echo '{"result": "data not found"}';
//        break;
//}
//
//function getDataForLoginUser(){
//   $loginId= DB::query( 'SELECT user_name , user_password FROM bank_users', array());
//    if ($loginId){
//        print_r(json_encode($loginId));
//       // echo json_encode($loginId);
//    }else{
//        echo '{"result": "not found"}';
//    }
//}