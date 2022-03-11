<?php

//Instantiate new Author
$author = new Author($db);

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$author->id = $data->id;

$author->author = $data->author;

//Update Author

//Update Quote

if($author->update()){

    $authorUpdated_arr = array(
        'id' => $author->id,
        'author' => $author->author,
        
    );
    
    print_r(json_encode($authorUpdated_arr));


} else {

    echo json_encode(
        array('message' => 'Error Occured Author Not Updated')
    );
}