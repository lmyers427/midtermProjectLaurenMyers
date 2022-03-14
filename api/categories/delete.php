<?php

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$category->id = isset($data->id) ? $data->id : die("Quote not entered");

//Delete Author

if($category->delete()){

    $categoryDeleted_arr = array(
        'id' => $category->id,
    );
    
    print_r(json_encode($categoryDeleted_arr));

   


} else {

    echo json_encode(
        array('message' => 'Category not Deleted')
    );
}