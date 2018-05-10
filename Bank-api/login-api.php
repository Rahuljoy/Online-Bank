<?php
include ('../classes/DB.php');
header("Content-type: application/json");
$request=$_SERVER['REQUEST_METHOD'];

switch ($request){
    case 'GET':
        echo '{"result": "get receive"}';
        break;

    default:
        echo '{"result": "not found"}';
        break;
}