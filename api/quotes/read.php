<?php

//Instantiate quote object

$quote = new Quote($db);

//read query

$result = $quote->read();

//Get row count

$num = $result->rowCount();

//Check if any quotes
if($num > 0){

    //Author array

    $quote_arr = array();

<<<<<<< HEAD
    //Removed 'data'

=======
>>>>>>> parent of 9f261c7 (Revert "Update quotes, categories, and authors read.php files")

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

            $quote_item = array(

                'id' => $id,
                'quote' => $quote,
                'authorId' => $authorId,
                'categoryId' => $categoryId

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
