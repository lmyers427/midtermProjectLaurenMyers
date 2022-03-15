<?php

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
        array('message' => 'Unable to create new Post')
    );
}
