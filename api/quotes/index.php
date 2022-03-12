<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}

include_once '../../config/Database.php';
include_once '../../models/Quote.php';

include_once '../../function/isValid.php';

//Instantiate DB & connect

$database = new Database();

$db = $database->connect();


//Instantiate quote object

$quote = new Quote($db);

//Test method by Case Statement


switch ($method) {

    case 'GET' && isset($_GET['id']):

       $id = isset($_GET['id']) ? $_GET['id'] : die('Missing Required Id Parameter');


        $quoteIdExists = isValid($id, $quote);
        

       if(!$quoteIdExists){

        echo json_encode(
            array('message' => 'No Quotes Found')
        );

        }
        else{

            include_once 'read_single.php';
        }
        
        break;

    case 'GET' && isset($_GET['authorId']) && isset($_GET['categoryId']):

        $authorExists = isValid('authorId', $quote);
        $categoryExists = isValid('categoryId', $quote);

        if(!$authorExists || !$categoryExists){

            echo json_encode(
                array('message' => 'Author and/or Category does not Exist')
            );
        }
        else{

        include_once 'read_both.php';

        }

        break;

    case 'GET' && isset($_GET['authorId']):

        $authorId = isset($_GET['authorId']) ? $_GET['authorId'] : die('Missing Required Id Parameter');



        $authorExists = isValid($authorId, $quote);

        if(!$authorExists){

            echo json_encode(
                array('message' => 'authorId Not Found')
            );

     

        }
        else{

            include_once 'read_authorId.php';
        }
           
        break;

    case 'GET' && isset($_GET['categoryId']):

        include_once 'read_categoryId.php';
            
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