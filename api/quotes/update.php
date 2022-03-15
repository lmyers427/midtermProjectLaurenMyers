<?php

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