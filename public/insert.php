
<?php
session_start();
include "db.php";

if(isset($_POST['title'])) {//if $_POST is
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql = "INSERT INTO tasks (`title`,`user_id`,`status`) VALUES (?, ?,0)";

    $statement = $pdo->prepare($sql);
    $statement->execute([
        $title,
        $_SESSION["userid"]
    ]);
    $id = $pdo->lastInsertId();
    echo json_encode(["success"=> "ok" ]);
} else{ 
    echo json_encode(["success"=> false ]);
}

?>
