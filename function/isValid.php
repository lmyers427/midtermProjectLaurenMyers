<?php

 function isValid($id, $model){

   //Set the id of the $model
     $model->id = $id;

    // Get the result of $model read_single method

    $result = $model->read_single();

    return $result;

}