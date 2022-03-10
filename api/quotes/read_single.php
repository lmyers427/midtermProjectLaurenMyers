<?php

//Instantiate quote object

$quote = new Quote($db);

//Get AuthorID
$quote->id = isset($_GET['id']) ? $_GET['id'] : die('Missing Required Id Parameter');

//read query

$result = $quote->read_single();

//Get row count

$num = $result->rowCount();

//Check if any quotes
if($num > 0){

    //Quote array

    $quote_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

            $quote_item = array(

                'id' => $id,
                'quote' => $quote,
                'authorName' => $authorName,
                'categoryName' => $categoryName

            );

            //Push to array

            array_push($quote_arr, $quote_item);
        
        
        //Convert to JSON & output

       

    }

    echo json_encode($quote_arr);


}else{

    //No quotes

    echo json_encode(
        array('message' => 'Quote ID does not Exist')
    );

}
