<?php
include ('../classes/DB.php');
header("Content-type: application/json");
$request=$_SERVER['REQUEST_METHOD'];

switch ($request){
    case 'GET':
        getDataForLoginUser();
        break;

    default:
        echo '{"result": "data not found"}';
        break;
}

function getDataForLoginUser(){
    $loginId= DB::query( 'SELECT user_name,user_password FROM bank_users', array());
    if ($loginId){
        echo json_encode($loginId);
    }else{
        echo '{"result": "not found"}';
    }
}