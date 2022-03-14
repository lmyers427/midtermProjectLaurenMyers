<?php

//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$author->id = isset($data->id) ? $data->id : die("Quote not entered");

//Delete Author

if($author->delete()){

    $authorDeleted_arr = array(
        'id' => $author->id,
    );
    
    print_r(json_encode($authorDeleted_arr));

   


} else {

    echo json_encode(
        array('message' => 'Author not Deleted')
    );
}