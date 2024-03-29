<?php 
session_start();//a function pou apothikeyei info se variablea gia na 
//xreishmopoihthoun se ;alles selides mexri na kleisei o browser
//makes the info of one user available to all pages in application
include "db.php"; 

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $password= filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if(empty($username)){//check is user_name is empty
  exit(json_encode(["success" => false, "msg" => "user name is empty."]));
//sends user from current page to login_index with an error message
}else if(empty($password)){//is password is empty
    exit(json_encode(["success" => false, "msg" => "user password is empty."]));
}

$sql = "SELECT * FROM users WHERE username=? LIMIT 1 ";

$stmnt = $pdo->prepare($sql);
$stmnt->execute([
    $username
]);
$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

if(count($result)&& password_verify($password, $result[0]["password"])){
    $_SESSION["userid"]=$result[0]["id"];//this sets the session "userid that will allow the app to go the the index"
    exit(json_encode(["success"=> "ok"]));
}else{
    exit(json_encode(["success"=> "notok", "msg"=>"username or\and password isn't correct"]));  
}