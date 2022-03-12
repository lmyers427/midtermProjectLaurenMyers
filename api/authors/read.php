<?php

//Instantiate author object

//$author = new Author($db);

//read query

$result = $author->read();

//Get row count

$num = $result->rowCount();

//Check if any authors
if($num > 0){

    //Author array

    $author_arr = array();


    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

            $author_item = array(

                'id' => $id,
                'author' => $author
            );

            //Push to array

            array_push($author_arr, $author_item);  
        
        
        //Convert to JSON & output

       

    }

    echo json_encode($author_arr);


}else{

    //No authors

    echo json_encode(
        array('message' => 'No authors found')
    );

}
