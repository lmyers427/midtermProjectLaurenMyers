<?php

//Instantiate quote object

$quote = new Quote($db);

//Get ID
$quote->id = isset($_GET['id']) ? $_GET['id'] : echo json_encode(array('message' => 'Missing Required Field'));
       
//Get Quote
$quote->read_single();

//Create array
$quote_arr = array(
    'id'=> $quote->id,
    'quote' => $quote->quote,
    'authorId' => $quote->authorId,
    'categoryId' => $quote->categoryId
);

//Make JSON
print_r(json_encode($quote_arr));