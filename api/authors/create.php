<?php

//Create Author

if($author->create()){

    //Create array of new Category
    $author_arr = array(
        
    'id' => $author->id,
    'author' => $author->author
);


    print_r(json_encode($author_arr));

} else {

    echo json_encode(
        array('message' => 'Author Not Created')
    );
}