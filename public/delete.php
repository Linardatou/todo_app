<?php
//button to delete data from table 

if(isset($_POST["id"])){
    delete_task();
  }
  function delete_task() {
    include "db.php";
  // Check connection
    $sql = "DELETE FROM tasks WHERE id=?"; //
    $statement = $pdo->prepare($sql);

    $statement->execute([$_POST["id"]]);
    exit(json_encode(["success"=> "ok"]));
  } 
?>