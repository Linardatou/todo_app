<?php
//button to delete data from table 

if(isset($_POST["id"])){
    delete_task();
  }
  function delete_task() {
    include "db.php";
  // Check connection
  if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
  }
    $del = "DELETE FROM tasks WHERE id=".$_POST["id"]; //
    $mysqli->query($del);
    exit(json_encode(["success"=> "ok"]));
  } 
?>