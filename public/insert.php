<?php
include "db.php";

if(isset($_POST['task'])) {

    $title = filter_var($_POST['task'], FILTER_SANITIZE_SPECIAL_CHARS);
  
    $sql = "INSERT INTO tasks (`title`,`status`) VALUES ('$title', 0)";
    $cl = $mysqli->query($sql);
    }
header("Location: index.php");

