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

include_once '../../function/isValid.php';

//Instantiate DB & connect

$database = new Database();

$db = $database->connect();

//Instantiate author object

$author = new Author($db);



switch ($method) {

    case 'GET' && isset($_GET['id']):


        $id = isset($_GET['id']) ? $_GET['id'] : die('Missing Required Id Parameter');


        $authorExists = isValid($id, $author);
        

       if(!$authorExists){

        echo json_encode(
            array('message' => 'authorId Not Found')
        );

        }
        else{

            include_once 'read_single.php';
        }

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

        include_once 'delete.php';

        break;

    default:

        echo "Request not GET POST PUT or DELETE.";

}