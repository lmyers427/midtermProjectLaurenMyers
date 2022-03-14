<?php

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$category->id = $data->id;

$category->category = $data->category;

//Update Category

if($category->update()){

    $categoryUpdated_arr = array(
        'id' => $category->id,
        'category' => $category->category
        
    );
    
    print_r(json_encode($categoryUpdated_arr));


} else {

    echo json_encode(
        array('message' => 'Error Occured Author Not Updated')
    );
}