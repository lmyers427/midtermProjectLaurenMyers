<?php
      
//Get author
$result = $category->read_single();

//Get row count
$num = $result->rowCount();

//Check if authors
if($num > 0){

  $row = $result->fetch(PDO::FETCH_ASSOC);
   extract($row);

          $category_item = array(

              'id' => $id,
              'category' => $category,
          );


  echo json_encode($category_item);

}
else{

  //No quotes

  echo json_encode(
      array('message' => 'No Category found')
  );

}
