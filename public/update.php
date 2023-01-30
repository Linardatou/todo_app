<?php
//button to update data from table 

if(isset($_POST["id"])){
    update_task();
   
  }
  function update_task(){
  //create connection
  include "db.php";
  // Check connection
  if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
  }
    $up = "UPDATE tasks SET status='".$_POST["status"]."' WHERE id=".$_POST["id"]; 
   $mysqli->query($up);
   exit(json_encode(["success"=> "ok"]));
}
?>
