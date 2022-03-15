<?php

//Create Category

if($category->create()){

    //Create array of new Category
    $category_arr = array(
    'id' => $category->id,
    'category' => $category->category
);


    print_r(json_encode($category_arr));

} else {

    echo json_encode(
        array('message' => 'Category Not Created')
    );
}