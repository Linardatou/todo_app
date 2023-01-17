<?php
//button to delete data from table 

if(isset($_GET["id"])){
    delete_task();
    header("Location: ./jereis.php");
  }
  function delete_task(){

    $hostname = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "todoapp";
    
  //create connection
  $mysqli = new mysqli($hostname, $username,  $password, $dbname);
    
  // Check connection
  if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
  }
    $del = "DELETE FROM tasks WHERE id=".$_GET["id"]; //
    $mysqli->query($del);

  }
?>