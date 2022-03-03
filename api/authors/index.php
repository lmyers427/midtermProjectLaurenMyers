<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}

include_once '../../config/Database.php';
include_once '../../models/Author.php';

//Instantiate DB & connect

$database = new Database();

$db = $database->connect();


switch ($method) {

    case 'GET' && isset($_GET['id']):

         include_once 'read_single.php';
        
        break;
    
    case 'GET':

        include_once 'read.php';

        break;

    case 'POST':
        
        include_once 'create.php';
        break;

    case 'PUT':

        include_once 'update.php';
        break;

    case 'DELETE':

        //include_once 'delete.php';

    default:

        echo "Request not GET POST PUT or DELETE.";

}