<?php 
session_start();
if(isset($_SESSION["userid"])){
    header("Location: index.php");
}
include "db.php"; 
$stmnt = $pdo->query("SELECT * FROM users")
?>
<!DOCTYPE html>
<head>
    <title>Login Page for do to list</title>
    <link rel="stylesheet" href="style.css" type="text/css"> 
</head>
<body>

<div class="tapper"> 
<h1 style="color: rgb(0, 162, 255); text-align: center;">Login to use this app</h1>
<br>
    <form id="login-form">
        Enter username:
        <input type="text" id="username" placeholder="Enter username">
        <br><br>
        Enter password:
        <input type="text" id="password" placeholder="Enter password">
        <br><br>
        <input type=checkbox>Agree with our
         <a href="https://en.wikipedia.org/wiki/Terms_of_service">Terms and Conditions</a>
        <br><br><br>
        <button id="login">Submit</button>
    <form>
        <p>You have no account?<a href="signup.php">Sign Up</a></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">

$(function() {
    $("#login").on("click",function(event){
        event.preventDefault();
        const user_name = $("#username").val()
        const password = $("#password").val()
        const _this = $(this)
        $.ajax({
          url: "ajaxlogin.php",
          dataType: "json",
          type: "POST",
          data : {
            username : username,
            password : password,
          },
          success: function(data, textStatus, jqXHR){
            if(data.success == "ok")
            {
              window.location.href = "index.php"; 

            }else{
              console.log(data)
            }
          },
          error: function(jqXHR, textStatus, errorThrown){}
        });
      })
    });

</script>

</body>
</html>