
<?php
include "db.php";

if(isset($_POST['task'])) {
    $title = filter_var($_POST['task'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql = "INSERT INTO tasks (`title`,`status`) VALUES ('$title', 0)";

    $statement = $pdo->prepare($sql);
    $statement ->execute([
        '$title' => $title
    ]);
    $publisher_title = $pdo->lastInsertId();
    //$cl = $mysqli->query($sql);
}

header("Location: index.php");

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
