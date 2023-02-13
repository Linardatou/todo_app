<!--page that handles the  information-->

<?php 
session_start();//a function pou apothikeyei info se variablea gia na 
//xreishmopoihthoun se ;alles selides mexri na kleisei o browser
//makes the info of one user available to all pages in application
include "db.php"; 

if(isset($_POST['user_name']) && isset($_POST['password'])){
   // $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}//this creates a function to validate the input of the user
$user_name = validate($_POST['user_name']);
$password = validate($_POST['password']);

if(empty($user_name)){
    header("Location: login_index.php?error=user name is required");
//sends user from current page to login_index with an error message
}else if(empty($password)){
    header("Location: login_index.php?error=password is required");
}
if(!empty($user_name) && !empty($password)){
    
}