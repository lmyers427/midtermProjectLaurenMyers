<?php

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

$author->author = isset($data->author) ? $data->author : die("Missing Required Parameters");

//Create Author

if($author->create()){

    $authorCreated_arr = array(
        'id' => $author->id,
        'author' => $author->author
    );
    
    print_r(json_encode($authorCreated_arr));


} else {

    echo json_encode(
        array('message' => 'Error Occured: Quote Not Created')
    );
}
     