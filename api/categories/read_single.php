<?php

//Instantiate category object

$category = new Category($db);

//Get ID
$category->id = isset($_GET['id']) ? $_GET['id'] : die();
       
//Get category
$category->read_single();

//Create array
$category_arr = array(
    'id'=> $category->id,
    'author' => $category->author
);

//Make JSON
print_r(json_encode($category_arr));