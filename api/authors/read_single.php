<?php
   
//Get author
$result = $author->read_single();

//Get row count
$num = $result->rowCount();

//Check if authors
if($num > 0){

  $row = $result->fetch(PDO::FETCH_ASSOC);
   extract($row);

          $author_item = array(

              'id' => $id,
              'author' => $author,
          );


  echo json_encode($author_item);

}
else{

  //No quotes

  echo json_encode(
      array('message' => 'No Author found')
  );

}
