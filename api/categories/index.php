<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
}

include_once '../../config/Database.php';
include_once '../../models/Category.php';

include_once '../../function/isValid.php';

//Instantiate DB & connect

$database = new Database();

$db = $database->connect();

//Instantiate category object

$category = new Category($db);


switch ($method) {

    case 'GET' && isset($_GET['id']):

        $id = isset($_GET['id']) ? $_GET['id'] : die('Missing Required Parameters');

        $categoryExists = isValid($id, $category);
        

        if(!$categoryExists){
 
         echo json_encode(
             array('message' => 'categoryId Not Found')
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


        $categoryExists = isValid($id, $category);
        
        if(!$categoryExists){

            echo json_encode(
                array('message' => 'categoryId Not Found')
            );
    
            }
            else{
    
                include_once 'update.php';
            }
    
            break;


    case 'DELETE':

        $data = json_decode(file_get_contents("php://input"));

        $id = isset($data->id) ? $data->id : die('Missing Required Parameter');

        $categoryExists = isValid($id, $category);

        if(!$categoryExists){
            
            echo json_encode(
                array('message' => 'categoryId Not Found')
            );


        }
        else{
       
        include_once 'delete.php';

        }

        break;

    default:

        echo "Request not GET POST PUT or DELETE.";

}