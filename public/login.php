<?php 
session_start();
if(isset($_SESSION["userid"])){
    header("Location: index.php");
}
include "db.php"; 
?>
<!DOCTYPE html>
<head>
    <title>Login Page for do to list</title>
    <link rel="stylesheet" href="style.css" type="text/css"> 
</head>
<body>

<div class="tapper"> 
<h1 style="text-align: center;">Login to use this app</h1>
<br>
    <form id="login-form">
        Enter username:
        <input type="text" id="username" placeholder="Enter username">
        <br><br>
        Enter password:
        <input type="password" id="password" placeholder="Enter password">
        <br><br>
        <input type=checkbox id="check" onclick="checks()">Agree with our</input>
         <a href="https://en.wikipedia.org/wiki/Terms_of_service">Terms and Conditions</a>
        <br><br>
        <button id="login" class="submitBtn" disabled="true">Submit</button>
    <form>
        <p>You have no account?<a href="signup.php" >Sign Up</a></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="checkbox.js"></script>
<script>

$(function() {
    $("#login").on("click",function(event){
        event.preventDefault();
        const username = $("#username").val()
        const password = $("#password").val()
        const _this = $(this)
        $.ajax({
          url: "ajaxlogin.php",
          dataType: "json", //ALWAYS WRITE IT EXACTLY LIKE THAT
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