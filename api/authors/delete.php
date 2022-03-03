<?php

//Instantiate new Author
$author = new Author($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$author->id = $data->id;

//Delete Author

if($author->delete()){

    echo json_encode(
        array('message' => 'Author Deleted')
    );


} else {

    echo json_encode(
        array('message' => 'Author Not Deleted')
    );
}