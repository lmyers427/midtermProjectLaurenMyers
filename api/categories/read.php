<?php

//Instantiate category object

$category = new Category($db);

//read query

$result = $category->read();

//Get row count

$num = $result->rowCount();

//Check if any category
if($num > 0){

    //Category array

    $category_arr = array();

    $category_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        extract($row);

            $category_item = array(

                'id' => $id,
                'category' => $category
            );

            //Push to "data"

            array_push($category_arr['data'], $category_item);
        
        
        //Convert to JSON & output

       

    }

    echo json_encode($category_arr);


}else{

    //No categories

    echo json_encode(
        array('message' => 'No categories found')
    );

}
