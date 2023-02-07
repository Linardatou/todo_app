
<?php
include "db.php";

if(isset($_POST['task'])) {
    $title = filter_var($_POST['task'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql = "INSERT INTO tasks (`title`,`status`) VALUES ('$title', 0)";
    $cl = $mysqli->query($sql);
    echo "Please put a valid task to do";
}

header("Location: index.php");

//find way and how to sanitise and validate the input of user
//$title is the object 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $filtered_title = filter_input(INPUT_POST,"task",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //$newtitle = filter_var($_POST['task'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    function test_input($data){
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>
