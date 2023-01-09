<?php
//button to delete data from table 


if(array_key_exists('del', $_POST)){
    diagrafei();
  }
  function diagrafei(){
    $del = "DELETE FROM tasks WHERE id";
    //$dl = mysqli_query($mysqli, $del);
  }
?>