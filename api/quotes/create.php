<?php


//Get raw data

 $data = json_decode(file_get_contents("php://input"));

 $quote->quote = isset($data->quote) ? $data->quote : die("Missing Required Parameters");
 $quote->categoryId = isset($data->categoryId) ? $data->categoryId : die("Missing Required Parameters");
 $quote->authorId = isset($data->authorId) ? $data->authorId : die("Missing Required Parameters");
 

//Create Quote

if($quote->create()){

    $quoteCreated_arr = array(
        'id' => $quote->id,
        'quote' => $quote->quote,
        'categoryId' => $quote->categoryId,
        'authorId' => $quote->authorId
    );
    
    print_r(json_encode($quoteCreated_arr));


} else {

    echo json_encode(
        array('message' => 'Error Occured: Quote Not Created')
    );
}