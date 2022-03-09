<?php

//Instantiate quote object

$quote = new Quote($db);

//Get categoryID & authorId
$quote->categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : die("CategoryId not entered");

$quote->authorId = isset($_GET['authorId']) ? $_GET['authorId'] : die("AuthorId not entered");


//read query

$result = $quote->read_both();

//Get row count

$num = $result->rowCount();

//Check if any quotes
if($num > 0){

    //Author array

    $quote_arr = array();

    $quote_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

            $quote_item = array(

                'id' => $id,
                'quote' => $quote,
                'authorId' => $authorId,
                'categoryId' => $categoryId

            );

            //Push to "data"

            array_push($quote_arr['data'], $quote_item);
        
        
        //Convert to JSON & output

       

    }

    echo json_encode($quote_arr);


}else{

    //No quotes

    echo json_encode(
        array('message' => 'No quotes found')
    );

}
