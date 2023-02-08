
<?php
include "db.php";

if(isset($_POST['title'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql = "INSERT INTO tasks (`title`,`status`) VALUES (?, 0)";

    $statement = $pdo->prepare($sql);
    $statement->execute([
        $title
    ]);
    $id = $pdo->lastInsertId();
    exit(json_encode(["success"=> "ok"]));
}
exit(json_encode(["success"=> false ]));

?>
