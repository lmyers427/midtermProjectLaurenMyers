<?php

//Instantiate new Author
$author = new Author($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$author->id = $data->id;

$author->author = $data->author;

//Update Author

if($author->update()){

    echo json_encode(
        array('message' => 'Author Updated')
    );


} else {

    echo json_encode(
        array('message' => 'Author Not Updated')
    );
}