<?php
session_start();//start session
include "db.php";//includes the code that is in db.php so it creates connection to the server
$username = $password = $email = $fullname = "";

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['name'])){
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fullname = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = $_POST['password'];
    }

if(empty($username)){
    exit(json_encode(["success" => false, "msg" => "user name is empty."]));//sends user from current page to login_index with an error message
}else if(empty($email)){
    exit(json_encode(["success" => false, "msg" => "user email is empty."]));
}else if(empty($fullname)){
    exit(json_encode(["success" => false, "msg" => "name is empty."]));    
}else if(empty($password)){
    exit(json_encode(["success" => false, "msg" => "user password is empty."]));
}
$number = preg_match('@[0-9]@', $password);//must have one character
$uppercase = preg_match('@[A-Z]@', $password);//must contain a capital letter
$lowercase = preg_match('@[a-z]@', $password);//must contain a lowercase letter
$sc = preg_match('@[^\w\?;]@', $password);//must have one special character

 if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$sc){
     exit(json_encode(["success"=> false, "msg"=>"password needs at least a number, a lowercase and upercase letter and a special character"])); 
 }else{ 
    $password_hash=password_hash($password,PASSWORD_BCRYPT);

    try{
        $sql = "INSERT INTO users (`username`,`password`,`email`,`fullname`) VALUES (?,?,?,?)";
        $result=$pdo->prepare($sql)->execute([
        $username,
        $password_hash,
        $email, 
        $fullname
    ]);
    $id = $pdo->lastInsertId();
    if($id){
        $_SESSION["userid"]=$id;//this sets the session "userid that will allow the app to go the the index"
        exit(json_encode(["success"=> "ok"]));
    }else{
        exit(json_encode(["success"=> "notok", "msg"=>print_r($result, true)])); 
    }
    } catch(PDOException $e){
        exit(json_encode(["success"=> "notok", "msg"=>$e->getMessage()])); 
    }
}