<?php

//Instantiate new Author
$quote = new Quote($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$quote->id = isset($data->id) ? $data->id : die("Quote ID not entered");

$quote->quote = isset($data->quote) ? $data->quote : die("Quote not entered");

$quote->categoryId = isset($data->categoryId) ? $data->categoryId : die("CategoryId not entered");

$quote->authorId = isset($data->authorId) ? $data->authorId : die("AuthorId not entered");

//Update Quote

if($quote->update()){

    $quoteUpdated_arr = array(
        'id' => $quote->id,
        'quote' => $quote->quote,
        'categoryId' => $quote->categoryId,
        'authorId' => $quote->authorId
    );
    
    print_r(json_encode($quoteUpdated_arr));


} else {

    echo json_encode(
        array('message' => 'Error Occured Quote Not Updated')
    );
}