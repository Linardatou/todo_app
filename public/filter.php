<?php
include "db.php";
//find way and how to sanitise and validate the input of user
//$title is the object 

if($_SERVER["REQUEST_METHOD"] == "POST"){
$unfiltered_title = test_input($_POST["task"]);
//$newtitle = filter_var($_POST['task'], FILTER_SANITIZE_SPECIAL_CHARS);
}

function test_input($data){
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>