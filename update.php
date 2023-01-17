<?php
//button to update data from table 

if(isset($_GET["id"])){
    update_task();
    header("Location: ./jereis.php");
  }
  function update_task(){

    $hostname = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "todoapp";
    
  //create connection
  $mysqli = new mysqli($hostname, $username,  $password, $dbname);

  $bob = ($row=["status"]==0);
    
  // Check connection
  if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
  }
    $up = "UPDATE tasks SET status='1' WHERE id=".$_GET["id"]; 
    $mysqli->query($up);
  }

?>