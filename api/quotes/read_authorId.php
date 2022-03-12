<?php

//Instantiate quote object

//$quote = new Quote($db);

//Get AuthorID
$quote->authorId = isset($_GET['authorId']) ? $_GET['authorId'] : die('Missing AuthorId');

//read query

$result = $quote->read_authorId();

//Get row count

$num = $result->rowCount();

//Check if any quotes
if($num > 0){

    //Author array


    $row = $result->fetch(PDO::FETCH_ASSOC);

        extract($row);

            $quote_item = array(

                'id' => $id,
                'quote' => $quote,
                'author' => $authorName,
                'category' => $categoryName

            );

            //Push to author

           
        
        
        //Convert to JSON & output

       

    
        echo json_encode($quote_item);



}else{

    //No quotes

    echo json_encode(
        array('message' => 'No quotes for that author ID found')
    );

}
