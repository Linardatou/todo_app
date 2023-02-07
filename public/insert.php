
<?php
include "db.php";
echo htmlspecialchars($_SERVER["PHP_SELF"]);

if(isset($_POST['task'])) {
    $sql = "INSERT INTO tasks (`title`,`status`) VALUES ('$title', 0)";
    $cl = $mysqli->query($sql);
    $title = filter_var($unfiltered_title, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    echo "Please put a valid task to do";
}

header("Location: index.php");

?>
