<?php

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, 
Access-Control-Allow-Methods, Authorization, X-Requested-With');

//Instantiate new Author
$author = new Author($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

$author->author = $data->author;

//Create Author

if($author->create()){

    echo json_encode(
        array('message' => 'Author Created')
    );


} else {

    echo json_encode(
        array('message' => 'Post Not Created')
    );
}