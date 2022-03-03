<?php

//Instantiate new Category
$category = new Category($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$category->id = $data->id;

//Delete Category

if($category->delete()){

    echo json_encode(
        array('message' => 'Category Deleted')
    );


} else {

    echo json_encode(
        array('message' => 'Category Not Deleted')
    );
}