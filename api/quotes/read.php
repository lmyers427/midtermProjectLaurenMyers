<?php

//Instantiate quote object

$quote = new Quote($db);

//read query

$result = $quote->read();

 echo json_encode(
        array('message' => 'we made it here')
    );

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
        array('message' => 'No quotes found')
    );

}
