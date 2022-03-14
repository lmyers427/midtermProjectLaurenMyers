<?php

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$quote->id = isset($data->id) ? $data->id : die("Quote not entered");


//Delete Quote

if($quote->delete()){

    $quoteDeleted_arr = array(
        'id' => $quote->id,
    );
    
    print_r(json_encode($quoteDeleted_arr));

   


} else {

    echo json_encode(
        array('message' => 'Error Occured: Quote Not Deleted')
    );
}