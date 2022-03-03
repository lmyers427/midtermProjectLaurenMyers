<?php

//Instantiate new Author
$quote = new Quote($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$quote->id = $data->id;

$quote->quote = $data->quote;

$quote->categoryId = $data->categoryId; 

$quote->authorId = $data->authorId;

//Update Quote

if($quote->update()){

    echo json_encode(
        array('message' => 'Quote Updated')
    );


} else {

    echo json_encode(
        array('message' => 'Quote Not Updated')
    );
}