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


        $id = isset($_GET['id']) ? $_GET['id'] : die('Missing Required Parameters');


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

        $data = json_decode(file_get_contents("php://input"));

        $id = isset($data->id) ? $data->id : die('Missing Required Parameters');


        $authorExists = isValid($id, $author);
        
        if(!$authorExists){

            echo json_encode(
                array('message' => 'authorId Not Found')
            );
    
            }
        elseif(isset($data->id) && isset($data->author)){

            $author->id = $data->id;

            $author->author = $data->author;

            include_once 'update.php';

        }
            else{
    
                echo json_encode(
                    array('message' => 'Missing Required Parameters')
                );
            }
    
            break;

    case 'DELETE':

        $data = json_decode(file_get_contents("php://input"));

        $id = isset($data->id) ? $data->id : die('Missing Required Parameter');

        $authorExists = isValid($id, $author);

        if(!$authorExists){
            
            echo json_encode(
                array('message' => 'authorId Not Found')
            );


        }
        else{
       
        include_once 'delete.php';

        }

        break;

    default:

        echo "Request not GET POST PUT or DELETE.";

}