
<?php
include "db.php";

$errorEmpty = false;

if(isset($_POST['task'])) {

    $title = filter_var($_POST['task'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(filter_var($title, FILTER_VALIDATE_BOOL)){
        if(empty($title)){
            echo "Please put a valid task to do";
            $errorEmpty = true;
        }else{
        $sql = "INSERT INTO tasks (`title`,`status`) VALUES ('$title', 0)";
        $cl = $mysqli->query($sql);
        }
            echo "Please put a valid task to do";
    }
    
}

header("Location: index.php");

?>
