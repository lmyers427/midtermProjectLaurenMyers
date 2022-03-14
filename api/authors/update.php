<?php


//Get raw posted data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update 
if(isset($_PUT['id']) && isset($_PUT['author'])){


    $author->id = $_PUT['id'];

    $author->author = $_PUT['author'];


    //Update Author

    $author->update();

    $authorUpdated_arr = array(

        'id' => $author->id,
        'author' => $author->author
        
    );
    
    print_r(json_encode($authorUpdated_arr));

  

}
else{

    echo json_encode(
        array('message' => 'Missing Required Parameters')
    );
}

