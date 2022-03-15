<?php

//Update Author
 if($author->update()){

    $authorUpdated_arr = array(

        'id' => $author->id,
        'author' => $author->author
        
    );
    
    print_r(json_encode($authorUpdated_arr));

  

}
else{

    echo json_encode(
        array('message' => 'Not able to Update Authors')
    );
}

