<?php

//Instantiate new Quote
$quote = new Quote($db);

//Get raw data

$data = json_decode(file_get_contents("php://input"));

$quote->quote = $data->quote;
$quote->categoryId = $data->categoryId;
$quote->authorId = $data->authorId;


//Create Quote

if($quote->create()){

    echo json_encode(
        array('message' => 'Quote Created')
    );


} else {

    echo json_encode(
        array('message' => 'Quote Not Created')
    );
}