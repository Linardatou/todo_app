<?php
//button to delete data from table 

if(isset($_GET["id"])){
    delete_task();
    header("Location: ./index.php");
  }
  function delete_task() {
    include "db.php";
  // Check connection
  if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
  }
    $del = "DELETE FROM tasks WHERE id=".$_GET["id"]; //
    $mysqli->query($del);
  }
?>