<?php


//read query

$result = $quote->read_single();



//Get row count

$num = $result->rowCount();

//Check if any quotes
if($num > 0){

    $row = $result->fetch(PDO::FETCH_ASSOC);
     extract($row);

            $quote_item = array(

                'id' => $id,
                'quote' => $quote,
                'author' => $authorName,
                'category' => $categoryName

            );


    echo json_encode($quote_item);

}
else{

    //No quotes

    echo json_encode(
        array('message' => 'No Quotes found')
    );

}



