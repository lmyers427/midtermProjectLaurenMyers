<?php

//Instantiate new Category
$category = new Category($db);

//Get raw data

$data = json_decode(file_get_contents("php://input"));

$category->category = $data->category;

//Create Category

if($category->create()){

    echo json_encode(
        array('message' => 'Category Created')
    );


} else {

    echo json_encode(
        array('message' => 'Category Not Created')
    );
}