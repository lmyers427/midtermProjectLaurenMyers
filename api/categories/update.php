<?php

//Instantiate new Category
$category = new Category($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$category->id = $data->id;

$category->category = $data->category;

//Update Author

if($category->update()){

    echo json_encode(
        array('message' => 'Author Updated')
    );


} else {

    echo json_encode(
        array('message' => 'Author Not Updated')
    );
}