<?php
//code to update the status from "In Progress" to "Complete!"
if(array_key_exists('up', $_POST)){
    update();
  }
  function update(){
    $up = "UPDATE tasks SET status='Complete!' WHERE id";
  }
?>