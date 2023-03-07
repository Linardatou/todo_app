<?php
//janagrafei me pdo to status ston pinaka tasks 
if(isset($_POST["id"])){
    update_task();
   
  }
  function update_task(){
  //create connection
  include "db.php";
  // Check connection
   $sql = "UPDATE tasks SET status=? WHERE id=?"; 
   
   $statement = $pdo->prepare($sql); 
   $statement->execute([$_POST['status'], $_POST['id']]);
   exit(json_encode(["success"=> "ok"]));
}
?>
