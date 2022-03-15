<?php

//Update Category

if($category->update()){

    $categoryUpdated_arr = array(
        'id' => $category->id,
        'category' => $category->category
        
    );
    
    print_r(json_encode($categoryUpdated_arr));


} else {

    echo json_encode(
        array('message' => 'Error Occured Category Not Updated')
    );
}


