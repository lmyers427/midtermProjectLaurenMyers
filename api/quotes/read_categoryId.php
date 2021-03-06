<?php

//Get categoryID
$quote->categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : die('Missing Required Category Parameter');

//read query

$result = $quote->read_categoryId();

//Get row count

$num = $result->rowCount();

//Check if any quotes
if($num > 0){

    //Author array

    $quote_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

            $quote_item = array(

                'id' => $id,
                'quote' => $quote,
                'author' => $authorName,
                'category' => $categoryName

            );

            //Push to "data"

            array_push($quote_arr, $quote_item);
        
        
        //Convert to JSON & output

       

    }

    echo json_encode($quote_arr);


}else{

    //No quotes

    echo json_encode(
        array('message' => 'No quotes with that Category ID found')
    );

}
