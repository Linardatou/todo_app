<?php
session_start();//start session
include "db.php";//includes the code that is in db.php so it creates connection to the server
$username = $password = $email = $fullname = "";

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['name'])){
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fullname = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }//FILTER_SANITIZE_FULL_SPECIAL_CHARS already filters out blanks

if(empty($username)){//check if user_name is empty
    exit(json_encode(["success" => false, "msg" => "user name is empty."]));//sends user from current page to login_index with an error message
}else if(empty($password)){//is password is empty
    exit(json_encode(["success" => false, "msg" => "user password is empty."]));
}else if(empty($email)){//is password is empty
    exit(json_encode(["success" => false, "msg" => "user email is empty."]));
}else if(empty($name)){//is password is empty
    exit(json_encode(["success" => false, "msg" => "user name is empty."]));
}

$sql = "INSERT * INTO users (`username`,`password`,`email`,`fullname`) VALUES (?,?,?,?)";
$pdo->prepare($sql)->execute([
    $username,
    $password,
    $email,
    $fullname
]);
$id = $pdo->lastInsertId();
if($id){
    $_SESSION["userid"]=$id;
    exit(json_encode(["success"=> "ok"]));
}else{
    exit(json_encode(["success"=> "notok", "msg"=>"passwords you provided aren't the same"])); 
}