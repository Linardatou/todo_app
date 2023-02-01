<?php
include "db.php";
//find way and how to sanitise and validate the input of user
//$title is the object 
$newtitle = filter_var($_POST['task'], FILTER_SANITIZE_SPECIAL_CHARS);
echo $newtitle
?>