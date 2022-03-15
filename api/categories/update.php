<?php

//Get raw posted data

// $data = json_decode(file_get_contents("php://input"));

// //Set ID to update
// $category->id = isset($data->id) ? $data->id : die("Missing Required Parameters");

// $category->category = isset($data->category) ? $data->category : die("Missing Required Parameters");

//Update Category

// if($category->update()){

//     $categoryUpdated_arr = array(
//         'id' => $category->id,
//         'category' => $category->category
        
//     );
    
//     print_r(json_encode($categoryUpdated_arr));


// } else {

//     echo json_encode(
//         array('message' => 'Error Occured Category Not Updated')
//     );
// }

$category->update();

$categoryUpdated_arr = array(
    'id' => $category->id, 
    'category' => $category->category
);

$myJSON = json_encode($categoryUpdated_arr);

echo $myJSON;

