<?php

//Instantiate quote object

$quote = new Quote($db);

//Get ID
$quote->id = isset($_GET['id']) ? $_GET['id'] : die();
       
//Get Quote
if($quote->read_single() == false){




//Create array
$quote_arr = array(
    'id'=> $quote->id,
    'quote' => $quote->quote,
    'authorName' => $quote->authorName,
    'categoryName' => $quote->categoryName
);

//Make JSON
print_r(json_encode($quote_arr));
}
else{

    echo json_encode(
        array('message' => 'ID does not exist found')
    );
}