<?php

//Instantiate new Category
$category = new Category($db);

//Get raw data

$data = json_decode(file_get_contents("php://input"));

$category->category = $data->category;


//Create Category

if($category->create()){

    //Create array of new Category
    $category_arr = array(
    'id'=> $category->lastInsertId(),
    'category' => $category->category
);


    print_r(json_encode($category_arr));

} else {

    echo json_encode(
        array('message' => 'Category Not Created')
    );
}