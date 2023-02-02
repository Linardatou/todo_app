
<?php
include "db.php";

$errorEmpty = false;

if(isset($_POST['task'])) {

    $title = filter_var($_POST['task'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(filter_var($title, FILTER_VALIDATE_BOOL)){
        if(!empty($title)){
        $sql = "INSERT INTO tasks (`title`,`status`) VALUES ('$title', 0)";
        $cl = $mysqli->query($sql);
        }else{
        echo "Please put a valid task to do";
        $errorEmpty = true;
        }

    }
    
}

header("Location: index.php");

?>
